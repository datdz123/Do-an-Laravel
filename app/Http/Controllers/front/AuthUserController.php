<?php

namespace App\Http\Controllers\front;

use App\Helpers\websiteInformationHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthUserController extends Controller
{

    public function post_register(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required | email:rfc | email:strict',
            'phone' => 'required | regex:/^0[0-9]{9}$/',
            'password' => 'required|confirmed|min:6',
        ]);

        if (User::where('email', $request->email)->count() != 0) {
            alert('Thất bại', 'Email này đã được sử dụng!', 'warning');
            return back();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            alert('Thành công', 'Tài khoản đã được đăng ký!', 'success');
        } else {
            alert('Thất bại', 'Thêm mới thất bại!', 'error');
        }
        return back();
    }
    public function login(Request $request)
    {
        $redirect_uri = $request->redirect_uri;
        return view('front/login', compact('redirect_uri'));
    }
    public function post_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email:rfc | email:strict',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            toast('Đăng nhập thành công', 'success');
            return redirect()->route('home');
        } else {
            alert('Đăng nhập thất bại', 'Tài khoản hoặc mật khẩu không chính xác!', 'error');
            return back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return back();
    }
    public function forgot_password()
    {
        return view('front.forgot-password');
    }
    public function post_forgot_password(Request $request)
    {

        $this->validate($request, [
            'email' => 'required | email',
        ]);

        $email = $request->email;

        $checkUser = User::where('email', $email)->first();

        if (!$checkUser) {
            return back()->with('error', 'Địa chỉ email không tồn tại!');
        }

        $code = md5(time() . $email);
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();

        $redirect_uri = route('reset-user-password', ['code' => $checkUser->code, 'email' => $email]);
        $this->sendEmail($checkUser, $redirect_uri);

        return back()->with('success', 'Link lấy lại mật khẩu đã gửi vào email của bạn!');
    }
    public function reset_password(Request $request)
    {
        $email = $request->email;
        $code = $request->code;
        $checkUser = User::where(['email' => $email, 'code' => $code])->first();
        if (!$checkUser) {
            return redirect()->route('forgot-user-password')->with('error', 'Đường dẫn tạo lại mật khẩu không đúng, vui lòng thử lại sau!');
        }
        return view('front.reset-password', compact('email', 'code'));
    }
    public function post_reset_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required | min:6',
        ]);
        $email = $request->email;
        $code = $request->code;
        $checkUser = User::where(['email' => $email, 'code' => $code])->first();
        if (!$checkUser) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }

        $minutes = Carbon::now()->subMinutes(10);
        if ($checkUser->time_code <= $minutes) {
            return redirect()->route('forgot-user-password')->with('error', 'Code đã hết hạn, vui lòng thử lại sau!');
        }
        $checkUser->password = bcrypt($request->password);
        $checkUser->save();
        return redirect()->route('loginUser')->with('success', 'Mật khẩu của bạn đã được thay đổi!');
    }

    public function sendEmail($user, $redirect_uri)
    {
        $siteSettings = app('view')->getShared()['siteSettings'];
        $name_shop = $siteSettings['site_name'];
        $email_from = config('mail')['mailers']['smtp']['username'];
        $email_to   = $user->email;
        $email_name = $user->name;
        Mail::send('front.email.reset-password', compact('email_to', 'email_name', 'name_shop', 'redirect_uri'), function ($message) use ($email_to, $email_name, $name_shop, $email_from) {
            $message->from($email_from, $name_shop);
            $message->to($email_to, $email_name);
            $message->subject('Đặt lại mật khẩu');
        });
    }

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Tìm user theo google_id hoặc email
            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            if ($user) {
                // Cập nhật google_id nếu user đã tồn tại nhưng chưa có google_id
                if (!$user->google_id) {
                    $user->google_id = $googleUser->id;
                    $user->avatar = $googleUser->avatar;
                    $user->save();
                }
            } else {
                // Tạo user mới
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => null, // Password null vì đăng nhập bằng Google
                ]);
            }

            // Đăng nhập user
            Auth::login($user);

            toast('Đăng nhập bằng Google thành công!', 'success');
            return redirect()->route('home');
        } catch (\Exception $e) {
            alert('Đăng nhập thất bại', 'Có lỗi xảy ra khi đăng nhập bằng Google. Vui lòng thử lại!', 'error');
            return redirect()->route('loginUser');
        }
    }
}
