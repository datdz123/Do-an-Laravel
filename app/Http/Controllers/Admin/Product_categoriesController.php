<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Product_categoriesController extends Controller
{
    function index()
    {
        $product_categories = ProductCategory::orderBy('created_at', 'DESC')->get();
        return view('back/product_categories/index', compact('product_categories'));
    }

    function add()
    {
        $product_categories = ProductCategory::where(['parent_id' => '0'])->get();
        return view('back/product_categories/add', compact('product_categories'));
    }

    function post_add(Request $request)
    {

        $this->validate($request, [
            'name'  => 'required',

        ], [
            'name.required'    => 'Không được bỏ trống tên!',
        ]);
        $data=$request->all();
        ProductCategory::create($data);
        toast('Thêm mới thành công!', 'success');
        return redirect()->route('product_categories')->with('success', 'Thêm mới thành công.');
    }

    function delete($id)
    {
        if (ProductCategory::find($id)->delete()) {

            toast('Xóa thành công!', 'warning');
            return back()->with('success', 'Đã xóa thành công.');
        };
    }

    function update($id)
    {
        $product_categories = ProductCategory::where(['parent_id' => '0'])->get();
        $category = ProductCategory::find($id);
        return view('back/product_categories/update', compact('product_categories','category'));
    }
    function post_update(Request $request, $id)
    {

        $this->validate($request, [
            'name'  => 'required',

        ], [
            'name.required'    => 'Không được bỏ trống tên!',
        ]);

        ProductCategory::find($id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id
        ]);
        toast('Cập nhật thành công!', 'success');
        return redirect()->route('product_categories')->with('success', 'Cập nhật thành công.');
    }

    // function info($id)
    // {
    //     $product_categories = ProductCategory::find($id);
    //     return view('back/product_categories/info', compact('product_categories'));
    // }
}
