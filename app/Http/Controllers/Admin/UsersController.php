<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('back.users.index', compact('users'));
    }
    function delete($id)
    {
        if (User::find($id)->delete()) {
            toast('Đã xóa thành công!', 'success');
            return back()->with('success', 'Đã xóa thành công.');
        };
    }
    function add()
    {
        // $product_categories = ProductCategory::where(['parent_id' => '0'])->get();
        // return view('back/product_categories/add', compact('product_categories'));
    }

    function post_add(Request $request)
    {

        // $this->validate($request, [
        //     'name'  => 'required',

        // ], [
        //     'name.required'    => 'Không được bỏ trống tên!',
        // ]);
        // $data=$request->all();
        // ProductCategory::create($data);
        // toast('Thêm mới thành công!', 'success');
        // return redirect()->route('product_categories/add');
    }

    function update($id)
    {
        // $product_categories = ProductCategory::where(['parent_id' => '0'])->get();
        // $category = ProductCategory::find($id);
        // return view('back/product_categories/update', compact('product_categories','category'));
    }
    function post_update(Request $request, $id)
    {

        // $this->validate($request, [
        //     'name'  => 'required',

        // ], [
        //     'name.required'    => 'Không được bỏ trống tên!',
        // ]);

        // ProductCategory::find($id)->update([
        //     'name' => $request->name,
        //     'slug' => $request->slug,
        //     'parent_id' => $request->parent_id
        // ]);
        // toast('Cập nhật thành công!', 'success');
        // return back();
    }
}
