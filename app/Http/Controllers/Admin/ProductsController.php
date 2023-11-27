<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        // dd($products);
        return view('back/products/index', compact('products'));
    }

    function add()
    {

        // $product_categories = ProductCategory::where('parent_id', '!=', '0')->orderBy('created_at', 'DESC')->get();

        $product_categories = ProductCategory::get();
        return view('back/products/add', compact('product_categories'));
    }

    function post_add(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'price'  => 'required',
            'images'  => 'required',
            'size'  => 'required',
            'qty'  => 'required',
            'description'  => 'required',
            'content'  => 'required',
        ]);
        $price = $request->input('price');
        $discount = $request->input('discount');
        if ($price) {
            $price = Str_replace(',', '', $price);
        }
        if ($discount) {
            $discount = Str_replace(',', '', $discount);
        }

        if ($discount == '0' || $price <= $discount) {
            return back()->with('errorPrice', 'Giá khuyễn mãi phải nhỏ hơn giá.');
        }
        $size = implode(',', $request->size);
        $status = Product::create([
            'name'                => $request->name,
            'slug'                => $request->slug,
            'product_category_id' => $request->product_category_id,
            'images'              => $request->images,
            'description'         => $request->description,
            'content'             => $request->content,
            'images'              => $request->images,
            'price'               => $price,
            'discount'            => $discount,
            'size'                => $size,
            'qty'                 => $request->qty,
            'status'              => $request->status
        ]);

        // for($i = 0 ; $i < count($request->size) ; $i ++){
        //     ProductDetail::create([
        //         'product_id' => $product->id,
        //         'size' => $request->size[$i],
        //     ]);
        // }

        toast('Thêm mới thành công!', 'success');
        return redirect()->route('product')->with('success', 'Thêm mới thành công.');
    }

    function update($id)
    {
        $product_categories = ProductCategory::get();
        $product = Product::findOrFail($id);

        $product_size = Product::where('id', $id)->get();


        return view('back/products/update', compact('product', 'product_categories', 'product_size'));
    }

    function post_update($id, Request $request)
    {

        $this->validate($request, [
            'name'  => 'required',
            'price'  => 'required',
            'images'  => 'required',
            'size'  => 'required',
            'qty'  => 'required',
            'description'  => 'required',
            'content'  => 'required',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        }
        $price = $request->input('price');
        if ($price) {
            $data['price'] = Str_replace(',', '', $price);
        }
        if ($request->discount) {
            $data['discount'] = Str_replace(',', '', $request->discount);
        }

        if ($data['discount'] == '0' || $data['price'] <= $data['discount']) {
            return back()->with('errorPrice', 'Giá khuyễn mãi phải nhỏ hơn giá.');
        }

        $status = $product->fill($data)->update();


        toast('Cập nhật thành công!', 'success');
        return redirect()->route('product')->with('success', 'Cập nhật thành công.');
    }

    function delete($id)
    {
        $status = Product::find($id)->delete();
        toast('Xóa sản phẩm thành công!', 'success');
        return back()->with('success', 'Đã xóa thành công.');
    }
    public function comments()
    {
        $productComments = ProductComment::orderBy('created_at', 'DESC')->get();
        return view('back.products.comments', compact('productComments'));
    }
    public function delete_comments($id)
    {
        ProductComment::find($id)->delete();
        toast('Đã xóa thành công!', 'success');
        return back()->with('success', 'Đã xóa thành công.');
    }
}
