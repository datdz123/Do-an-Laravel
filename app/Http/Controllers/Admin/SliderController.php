<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function index(){
        $slider=Slider::get();
        return view('back/slider/index', compact('slider'));
    }
    function add(){
        return view('back/slider/add');
    }
    function post_add(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'images'  => 'required',
            'description'  => 'required',
        ]);

        $data=$request->all();
        Slider::create($data);
        toast('Thêm mới thành công!', 'success');
        return redirect()->route('slider')->with('success','Thêm mới thành công.');
    }
    function delete($id)
    {
        if (Slider::find($id)->delete()) {

            toast('Xóa thành công!', 'warning');
            return back()->with('success','Đã xóa thành công.');
        };
    }
    function update($id)
    {
        $slider = Slider::find($id);
        return view('back/slider/update', compact('slider'));
    }
    function post_update(Request $request, $id)
    {

        $this->validate($request, [
            'title'  => 'required',
            'images'  => 'required',
            'description'  => 'required',
        ]);
        $data=$request->all();
        Slider::find($id)->update($data);
        toast('Cập nhật thành công!', 'success');
        return redirect()->route('slider')->with('success','Cập nhật thành công.');
    }
}
