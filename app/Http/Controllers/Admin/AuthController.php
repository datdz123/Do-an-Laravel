<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\websiteInformationHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {
        return view('back.auth.login');
    }
    function post_login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $this->validate($request, [
            'email'     => 'required | email:filter',
            'password'  => 'required | min:4 | max:30',

        ], [
            'email.required'    => 'Không được bỏ trống email',
            'email.email'       => 'Email không đúng định dạng',
            'password.required' => 'Không được bỏ trống mật khẩu',
            'password.max'      => 'Mật khẩu không quá 30 kí tự',
            'password.min'      => 'Mật khẩu không dưới 5 kí tự',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $password,
        ], $request->input('remember'))) {
            // $admin = Admin::where('email', $email)->first();
            // Auth::login($admin);
             return redirect('admin');
        }



        Session::flash('error','Đăng nhập thất bại, email hoặc mật khẩu không chính xác!');
        return back();
    }
    function log_out(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function forgot_password()
    {
        return view('back.auth.forgot-password');
    }
    public function post_forgot_password(Request $request)
    {

        $this->validate($request, [
            'email' => 'required | email',
        ]);

        $email = $request->email;

        $checkAdmin = Admin::where('email', $email)->first();

        if (!$checkAdmin) {
            return back()->with('error', 'Địa chỉ email không tồn tại!');
        }

        $code = md5(time() . $email);
        $checkAdmin->code = $code;
        $checkAdmin->time_code = Carbon::now();
        $checkAdmin->save();

        $redirect_uri = route('reset-password', ['code' => $checkAdmin->code, 'email' => $email]);
        $this->sendEmail($checkAdmin, $redirect_uri);

        return back()->with('success', 'Link lấy lại mật khẩu đã gửi vào email của bạn!');
    }
    public function reset_password(Request $request)
    {
        $email = $request->email;
        $code = $request->code;
        $checkAdmin = Admin::where(['email' => $email, 'code' => $code])->first();
        if (!$checkAdmin) {
            return redirect()->route('forgot-password')->with('error', 'Đường dẫn tạo lại mật khẩu không đúng, vui lòng thử lại sau!');
        }
        return view('back.auth.reset-password', compact('email', 'code'));
    }
    public function post_reset_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required | min:6',
        ]);
        $email = $request->email;
        $code = $request->code;
        $checkAdmin = Admin::where(['email' => $email, 'code' => $code])->first();
        if (!$checkAdmin) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }

        $minutes = Carbon::now()->subMinutes(10);
        if($checkAdmin->time_code <= $minutes){
            return redirect()->route('forgot-password')->with('error', 'Code đã hết hạn, vui lòng thử lại sau!');
        }
        $checkAdmin->password = bcrypt($request->password);
        $checkAdmin->save();
        return redirect()->route('login')->with('success', 'Mật khẩu của bạn đã được thay đổi!');
    }

    public function sendEmail($user, $redirect_uri)
    {
        $siteSettings = app('view')->getShared()['siteSettings'];
        $name_shop = $siteSettings['site_name'];
        $email_from = config('mail')['mailers']['smtp']['username'];
        $email_to   = $user->email;
        $email_name = $user->name;
        Mail::send('back.send-email.reset-password', compact('email_to', 'email_name', 'name_shop', 'redirect_uri'), function ($message) use ($email_to, $email_name, $name_shop,$email_from) {
            $message->from($email_from, $name_shop);
            $message->to($email_to, $email_name);
            $message->subject('Đặt lại mật khẩu');
        });
    }
}
