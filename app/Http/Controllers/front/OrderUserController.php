<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderUserController extends Controller
{
    public function order($id){
        $order = Order::where('user_id',$id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('front.order',compact('order'));
    }
    public function orderNoAccount(){

    }
    public function order_detail($id){
        $order = Order::findOrFail($id);
        $order_detail = OrderDetail::where('order_id', $id)->get();
        return view('front.order-detail',compact('order_detail', 'order'));
    }
    public function order_cancel(Request $request){
        $id = $request->id;
        Order::find($id)->update([
            'status' => 'order has been cancelled'
        ]);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        foreach ($orderDetail as $key => $value) {
            Product::find($value->product_id)->increment('qty', $value->qty);
        }
        toast('Đã hủy đơn hàng!', 'success');
        return back();
    }
    public function check_order(Request $request){

        $q = $request->q ?? '';
        $order = Order::where('email', 'like', '%'.$q. '%')->orWhere('phone', 'like', '%'.$q. '%')->orderBy('created_at', 'DESC')->paginate(10);
        return view('front.check-order', compact('order'));
    }
}
