<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('back/products/index', compact('products'));
    }

    function add()
    {
        $product_categories = ProductCategory::get();
        return view('back/products/add', compact('product_categories'));
    }

    function post_add(ProductRequest $request)
    {
        $price    = $request->input('price');
        $discount = $request->input('discount');

        if ($discount == '0' || $price <= $discount) {
            return back()->with('errorPrice', 'Giá khuyễn mãi phải nhỏ hơn giá.');
        }

        Product::create([
            'name'                => $request->input('name'),
            'slug'                => $request->input('slug'),
            'product_category_id' => $request->input('product_category_id'),
            'images'              => $request->input('images'),
            'description'         => $request->input('description'),
            'content'             => $request->input('content'),
            'price'               => $price,
            'discount'            => $discount,
            'size'                => $request->input('size'), // Handled by Request
            'qty'                 => $request->input('qty'),
            'status'              => $request->input('status')
        ]);

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

    function post_update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($data['discount'] == '0' || $data['price'] <= $data['discount']) {
            return back()->with('errorPrice', 'Giá khuyễn mãi phải nhỏ hơn giá.');
        }

        $product->fill($data)->update();

        toast('Cập nhật thành công!', 'success');
        return redirect()->route('product')->with('success', 'Cập nhật thành công.');
    }

    function delete($id)
    {
        Product::find($id)->delete();
        toast('Xóa sản phẩm thành công!', 'success');
        return back()->with('success', 'Đã xóa thành công.');
    } // No $status variable needed

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
