<?php

namespace App\Http\Controllers\front;

use App\Helpers\cartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('front/cart');
    }
    public function add(cartHelper $cart, Request $request)
    {
        $product_id = $request->product_id;
        $size = $request->size;
        $qty = $request->qty;

        $pro = Product::where('id', $product_id)->first();
        // dd($pro);
        if ($pro->qty < $qty) {
            toast('Sản phẩm không đủ hàng!', 'error');
            return back();
        }

        $cart->add($product_id, $size, $qty);

        if ($request->pay_now == 'true') {
            return redirect()->route('cart');
        }

        toast('Đã thêm sản phẩm vào giỏ', 'success');
        return back();
    }
    public function remove(cartHelper $cart, $id)
    {
        $remove = $cart->remove($id);
        toast('Đã xóa sản phẩm khỏi giỏ!', 'success');
        return back();
    }
    public function clear(cartHelper $cart)
    {
        $cart->clear();
        toast('Đã xóa toàn bộ sản phẩm!', 'success');
        return back();
    }
    public function update(cartHelper $cart, $id)
    {
        $qty = request()->qty ? request()->qty : 1;
        $cart->update($id, $qty);
        return back();
    }
}
