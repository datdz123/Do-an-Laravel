<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('front.information');
        }
        return redirect()->route('loginUser');
    }
    public function get_changePassword()
    {
        return view('front.change-password');
    }

    public function changePassword(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        
        $this->validate($request, [
            'oldPassword' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ]);
        if (Hash::check($request->oldPassword, $user->password)) {
            User::find($user->id)->update([
                'password' => Hash::make($request->password)
            ]);
            toast('Mật khẩu đã được thay đổi','success');
            return back();
        }
        toast('Có lỗi xảy ra','error');
        return back();

        // $validator = Validator::make($request->all(), [
        //     'oldPassword' => 'required|min:6',
        //     'password' => 'required|confirmed|min:6',
        // ]);
        // if ($validator->passes()) {
        //     if (Hash::check($request->oldPassword, $user->password)) {
        //         User::find($user->id)->update([
        //             'password' => Hash::make($request->password)
        //         ]);
        //         return response()->json(['success' => ['success' => 'Mật khẩu đã được thay đổi']]);
        //     }
        //     return response()->json(['errors' => ['oldPassword' => 'Mật khẩu cũ không khớp']]);
        // } else {
        //     return response()->json(['errors' => $validator->errors()]);
        // }
    }
    public function changeInformation(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required | email:rfc | email:strict',
            'phone' => 'required | numeric',
        ]);
        if (User::where('email', $request->email)->whereNotIn('id', [$user->id])->count() != 0) {
            return response()->json(['errors' => ['email' => 'Email đã được sử dụng vùi lòng dùng email khác']]);
        }
        if ($validator->passes()) {

            User::find($user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            return response()->json(['success' => ['success' => 'Thông tin đã được thay đổi']]);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }
}
