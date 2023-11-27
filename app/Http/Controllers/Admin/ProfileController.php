<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back/profile/profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required | email:rfc | email:strict',
            'phone' => 'required | numeric',
            'check1' => 'in:on',
        ]);
        if ($validator->passes()) {
            Admin::find($request->admin_id)->fill($request->all())->update();
            return response()->json(['success' => ['success' => 'Thông tin đã được thay đổi']]);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
            'check2' => 'in:on',
        ]);
        if ($validator->passes()) {
            $admin = Admin::findOrFail($request->admin_id);
            if (Hash::check($request->oldPassword, $admin->password)) {
                Admin::find($admin->id)->update([
                    'password' => Hash::make($request->password)
                ]);
                return response()->json(['success' => ['success' => 'Mật khẩu đã được thay đổi']]);
            }
            return response()->json(['errors' => ['oldPassword' => 'Mật khẩu cũ không khớp']]);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }
}
