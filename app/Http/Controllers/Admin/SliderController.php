<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function index()
    {
        $slider = Slider::get();
        return view('back/slider/index', compact('slider'));
    }
    function add()
    {
        return view('back/slider/add');
    }
    function post_add(SliderRequest $request)
    {
        Slider::create($request->all());
        toast('Thêm mới thành công!', 'success');
        return redirect()->route('slider')->with('success', 'Thêm mới thành công.');
    }
    function delete($id)
    {
        if (Slider::find($id)->delete()) {

            toast('Xóa thành công!', 'warning');
            return back()->with('success', 'Đã xóa thành công.');
        };
    }
    function update($id)
    {
        $slider = Slider::find($id);
        return view('back/slider/update', compact('slider'));
    }
    function post_update(SliderRequest $request, $id)
    {
        Slider::find($id)->update($request->all());
        toast('Cập nhật thành công!', 'success');
        return redirect()->route('slider')->with('success', 'Cập nhật thành công.');
    }
}
