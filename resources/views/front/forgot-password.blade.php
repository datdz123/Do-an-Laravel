<!-- resources/views/front/auth/forgot-password.blade.php -->
@extends('front/layouts/masterlayout')
@section('content')
@section('title', __('Quên mật khẩu'))

<!-- Page Header Start -->
<div class="container-fluid page-header bg-secondary mb-5">
    <div class="header-content d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="breadcrumb d-inline-flex">
            <p class="m-0"><a href="">{{ __('Home') }}</a></p>
            <p class="separator m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Forgot Password Form Start -->
<div class="container-fluid login-section">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="login-form-container mb-4">
                <h4 class="font-weight-semi-bold mb-4">@yield('title')</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            {!! $alert::my_alert() !!}
                        </div>
                        <div class="col-md-12 form-group position-relative">
                            <label>{{ __('Nhập địa chỉ email đăng ký tài khoản') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                name="email" placeholder="abc@gmail.com" value="{{ old('email') }}">
                            <i class="fas fa-envelope position-absolute" style="right: 35px; top: 70%; transform: translateY(-50%); color: #999;"></i>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit"
                                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">{{ __('Xác nhận') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Forgot Password Form End -->
@endsection
@section('css')
<style>
    /* Tùy chỉnh container-fluid */
    .container-fluid {
        max-width: 1400px !important;
        padding: 0 15px;
    }

    /* Style cho Page Header */
    .page-header {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .header-content h1 {
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 1rem;
        letter-spacing: 2px;
    }

    .breadcrumb {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1rem;
    }

    .breadcrumb p {
        margin: 0;
        color: #fff;
    }

    .breadcrumb a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb a:hover {
        color: #f1c40f;
    }

    .breadcrumb .separator {
        margin: 0 10px;
        color: #fff;
    }

    /* Style cho form quên mật khẩu */
    .login-section {
        padding: 50px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
    }

    .login-form-container {
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        /* Giảm chiều rộng để form trông gọn gàng hơn */
        transition: transform 0.3s ease;
    }

    .login-form-container:hover {
        transform: translateY(-5px);
    }

    .login-form-container h4 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
    }

    .login-form-container h4::after {
        content: '';
        width: 50px;
        height: 3px;
        background: #6e8efb;
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 1rem;
        font-weight: 500;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    .form-group .form-control {
        height: 50px;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 0 15px;
        font-size: 1rem;
        color: #333;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group .form-control:focus {
        border-color: #6e8efb;
        box-shadow: 0 0 8px rgba(110, 142, 251, 0.2);
        outline: none;
    }

    .form-group .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-group .alert-danger {
        margin-top: 5px;
        font-size: 0.9rem;
        padding: 8px;
        border-radius: 5px;
    }

    .form-group .btn-primary {
        background: #6e8efb;
        border: none;
        padding: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .form-group .btn-primary:hover {
        background: #5a78e3;
        transform: translateY(-2px);
    }

    .links {
        text-align: center;
        margin-top: 20px;
    }

    .links a {
        color: #6e8efb;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .links a:hover {
        color: #5a78e3;
        text-decoration: underline;
    }

    .links .separator {
        margin: 0 10px;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .login-form-container {
            padding: 20px;
            max-width: 90%;
        }

        .page-header {
            min-height: 200px;
        }

        .header-content h1 {
            font-size: 2rem;
        }

        .breadcrumb {
            font-size: 0.9rem;
        }
    }
</style>
@endsection