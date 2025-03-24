<!-- resources/views/front/auth/register.blade.php -->
@extends('front/layouts/masterlayout')
@section('content')
    @section('title', 'Đăng ký')
    @include('front.components.top-bar')>
    <div class="container-fluid login-section">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="login-form-container mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Tạo tài khoản</h4>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group position-relative">
                                <label>Tên</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                       name="name" placeholder="Họ và tên" value="{{ old('name') }}">
                                <i class="fas fa-user position-absolute" style="right: 5%; top: 70%; transform: translateY(-50%); color: #999;"></i>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group position-relative">
                                <label>Địa chỉ email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                       name="email" placeholder="abc@gmail.com" value="{{ old('email') }}">
                                <i class="fas fa-envelope position-absolute" style="right: 5%; top: 70%; transform: translateY(-50%); color: #999;"></i>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group position-relative">
                                <label>Số điện thoại</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                       name="phone" placeholder="09871234" value="{{ old('phone') }}">
                                <i class="fas fa-phone position-absolute" style="right: 5%; top: 70%; transform: translateY(-50%); color: #999;"></i>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group position-relative">
                                <label>Mật khẩu</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password"
                                       type="password" placeholder="">
                                <i class="fas fa-lock position-absolute" style="right: 5%; top: 70%; transform: translateY(-50%); color: #999;"></i>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group position-relative">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation" type="password" placeholder="">
                                <i class="fas fa-lock position-absolute" style="right: 5%; top: 70%; transform: translateY(-50%); color: #999;"></i>
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit"
                                        class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đăng ký</button>
                            </div>
                            <div class="col-md-12 form-group links">
                                <a href="{{ route('loginUser') }}">Đăng nhập ở đây</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form End -->
@endsection
    @section('css')
        <style>
            /* Tùy chỉnh container-fluid */
            .container-fluid {
                max-width: 1400px !important;
                padding: 0 15px;
            }


            .login-section {
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
                max-width: 600px; /* Giảm chiều rộng để form trông gọn gàng hơn */
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
