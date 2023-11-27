<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:super-admin|banner view', ['only' => ['index','edit']]);
        $this->middleware('role_or_permission:super-admin|edit banner', ['only' => ['update']]);
        $this->middleware('role_or_permission:super-admin|delete banner', ['only' => ['destroy']]);
        $this->middleware('role_or_permission:super-admin|create banner', ['only' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id', 'DESC')->get();
        return view('back.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => 'required | max:50',
            "content" => 'required | max:70',
            "size" => 'required',
        ]);
        try {
            if(!Banner::create($request->all())){
                return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        toast('Thêm mới thành công!','success');
        return redirect()->route('banner.index')->with('success','Thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('back.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => 'required | max:50',
            "content" => 'required | max:70',
            "size" => 'required',
        ]);
        try {
            if(!Banner::find($id)->update($request->all())){
                return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        toast('Cập nhật thành công!','success');
        return redirect()->route('banner.index')->with('success','Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if(!Banner::find($id)->delete()){
                return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
        toast('Đã xóa thành công!','success');
        return redirect()->route('banner.index')->with('success','Đã xóa thành công.');
    }
}
