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
            'provincial' => $request->province_name,
            'district' => $request->district_name,
            'ward' => $request->ward_name,
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
   public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request)
    {


        include "../common/helper.php";

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() ."";
        $returnUrl = "http://localhost:8000/atm/result_atm.php";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
// Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";

            $partnerCode = $_POST["partnerCode"];
            $accessKey = $_POST["accessKey"];
            $serectkey = $_POST["secretKey"];
            $orderid = time()."";
            $orderInfo = $_POST["orderInfo"];
            $amount = $_POST["amount"];
            $bankCode = $_POST['bankCode'];
            $returnUrl = $_POST['returnUrl'];
            $requestId = time()."";
            $requestType = "payWithMoMoATM";
            $extraData = "";
            //before sign HMAC SHA256 signature
            $rawHashArr =  array(
                'partnerCode' => $partnerCode,
                'accessKey' => $accessKey,
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderid,
                'orderInfo' => $orderInfo,
                'bankCode' => $bankCode,
                'returnUrl' => $returnUrl,
                'notifyUrl' => $notifyurl,
                'extraData' => $extraData,
                'requestType' => $requestType
            );
            // echo $serectkey;die;
            $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderid."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);

            $data =  array('partnerCode' => $partnerCode,
                'accessKey' => $accessKey,
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderid,
                'orderInfo' => $orderInfo,
                'returnUrl' => $returnUrl,
                'bankCode' => $bankCode,
                'notifyUrl' => $notifyurl,
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result,true);  // decode json

            error_log( print_r( $jsonResult, true ) );
            header('Location: '.$jsonResult['payUrl']);

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
