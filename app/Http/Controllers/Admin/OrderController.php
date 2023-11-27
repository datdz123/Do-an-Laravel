<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(Request $request)
    {
        $order = Order::orderBy('status', 'ASC')->get();

        // if ($request->removeFt == 'true') {
        //     $date = '';
        //     $price =  '';
        //     $status = '';
        // } else {
        $date = $request->date ?? '';
        $price = $request->price ?? '';
        $status = $request->status ?? '';
        // }
        $dateFrom = '';
        $dateTo = '';
        if ($date) {
            if ($date[0] != '' && $date[1] != '') {
                $dateFrom = $date[0];
                $dateTo = $date[1];
                $order = $order->whereBetween('created_at', [date('Y-m-d', strtotime($dateFrom)), date('Y-m-d', strtotime($dateTo))]);
            }
        }
        if ($status != '') {
            $order = $order->where('status', $status);
        }
        $priceFrom = '';
        $priceTo = '';
        if ($price) {
            if ($price[0] != '' && $price[1] != '') {
                $priceFrom = Str_replace(',', '', $price[0]);
                $priceTo = Str_replace(',', '', $price[1]);
                $order = $order->whereBetween('total', [$priceFrom, $priceTo]);
            }
        }

        $dataView = [
            'order'               => $order,
            'dateFrom'            => $dateFrom,
            'dateTo'              => $dateTo,
            'priceFrom'           => $priceFrom,
            'priceTo'             => $priceTo,
            'status'              => $status
        ];
        // dd($date);
        return view('back.order.index', $dataView);
    }
    function detail($id)
    {
        $order = Order::findOrFail($id);
        $order_detail = OrderDetail::where('order_id', $id)->get();
        return view('back.order.order-detail', compact('order_detail', 'order'));
    }
    function edit(Request $request)
    {
        // dd($request->all());
        if ($request->status == 'delivered') {
            $order = Order::find($request->id)->update([
                'payment_status' => 'paid',
            ]);
        } else if ($request->status == 'order has been cancelled') {
            $orderDetail = OrderDetail::where('order_id', $request->id)->get();
            foreach ($orderDetail as $key => $value) {
                Product::find($value->product_id)->increment('qty', $value->qty);
            }
        }
        $order = Order::find($request->id)->update([
            'status' => $request->status,
        ]);
        if ($order) {
            toast('Cập nhật trạng thái đơn hàng thành công!', 'success');
            return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
        } else {
            toast('Có lỗi xảy ra, vui lòng thử lại sau!', 'error');
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
    }
    function delete(Request $request)
    {
        OrderDetail::where('order_id', $request->id)->delete();
        Order::find($request->id)->delete();
        toast('Đã xóa thành công!', 'success');
        return redirect()->route('order')->with('success', 'Đã xóa thành công.');
    }
    public function print($id)
    {
        $order = Order::findOrFail($id);
        $order_detail = OrderDetail::where('order_id', $id)->get();
        return view('back.order.invoice-print', compact('order_detail', 'order'));
    }
}
