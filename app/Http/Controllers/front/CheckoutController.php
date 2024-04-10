<?php

namespace App\Http\Controllers\front;

use App\Helpers\cartHelper;
use App\Helpers\websiteInformationHelper;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use App\Models\SiteSetting;
use App\Models\Ward;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function index()
    {
        if (session('cart') != []) {
            $provinces = Province::all();
            return view('front.checkout', compact('provinces'));
        } else {
            // alert('', 'Có vẻ bạn chưa có đơn hàng nào!', 'warning');
            return back();
        }
    }
    function success()
    {
        return view('front.checkout-success');
    }
    function fail()
    {

        return view('front.checkout-fail');
    }
    function order(cartHelper $cart, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email:rfc | email:strict',
            'phone'  => 'required | alpha_num',
            'street_address' => 'required',
            'note' => 'required | max: 500',
            'province' => 'required',
            'district' => 'required',
            'wards' => 'required',
            'payment_method' => 'required',
        ]);
        $payment_status = 'unpaid';
        $status = 'new';

        if ($order = Order::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'street_address' => $request->street_address,
            'note' => $request->note,
            'provincial' => $request->province,
            'district' => $request->district,
            'ward' => $request->wards,
            'payment_method' => $request->payment_method,
            'payment_status' => $payment_status,
            'status' => $status,
        ]))
        {
            $main_total = 0; // tổng tiền đơn hàng
            $order_id = $order->id;
            foreach ($cart->items as $item) {
                $size = $item['size'];
                $qty = $item['qty'];
                $total = $item['price'] * $item['qty'];
                $main_total += $total;
                OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $item['product_id'],
                    'size' => $size,
                    'qty' => $qty,
                    'total' => $total,
                ]);
                Product::find($item['product_id'])->decrement('qty', $qty);
            }
            Order::find($order_id)->update([
                'total' => $main_total
            ]);


            if ($request->payment_method == 'payment on delivery') { // thanh toán trực tiếp
//                $this->sendEmail($order);
                session(['cart' => '']);
                return redirect()->route('checkout.success');
            }

            if ($request->payment_method == 'online payment') { //thanh toán online
                return redirect()->to(VNPay::vnpay($order_id,$main_total));
            }
        } else {
            alert('Thất bại', 'Đã có lỗi trong quá trình đặt hàng!', 'error');
            return back();
        }

    }

    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();
        return response()->json($districts);
    }

    public function getWards($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->get();
        return response()->json($wards);
    }

    public function vnPayCheck(Request $request)
    {
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');  //mã phản hòi kết quả thanh toán
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //ticket id
        $vnp_Amount = $request->get('vnp_Amount'); //số tiền thanh toán

        $order = Order::findOrFail($vnp_TxnRef); // tìm đơn hàng

        //kiểm tra kết quả giao dịch
        if ($vnp_ResponseCode != null) { //thành công
            if ($vnp_ResponseCode == 00) {
//                $this->sendEmail($order);
                $order->update([
                    'payment_status' => 'paid'
                ]);
                session(['cart' => '']);
                return redirect()->route('checkout.success');
            } else { // thất bại
                $oderDetail = OrderDetail::where('order_id', $vnp_TxnRef)->get();
                foreach ($oderDetail as $key => $value) {
                    Product::find($value->product_id)->increment('qty', $value->qty);
                }
                OrderDetail::where('order_id', $vnp_TxnRef)->delete();
                Order::find($vnp_TxnRef)->delete();
                return redirect()->route('checkout.fail');
            }
        }
    }

    public function sendEmail($order)
    {   $siteSettings = app('view')->getShared()['siteSettings'];
        $name_shop = $siteSettings['site_name'];
        $email_from = config('mail')['mailers']['smtp']['username'];
        $email_to   = $order->email;
        $email_name = $order->name;
        Mail::send('front.email.send-email', compact('order', 'email_name', 'name_shop'), function ($message) use ($email_to, $email_name, $name_shop,$email_from) {
            $message->from($email_from, $name_shop);
            $message->to($email_to, $email_name);
            $message->subject('Thông báo đặt hàng thành công');
        });
    }
}
