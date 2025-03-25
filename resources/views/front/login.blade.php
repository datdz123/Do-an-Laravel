<!-- resources/views/front/auth/login.blade.php -->
@extends('front/layouts/masterlayout')

@section('content')
    @section('title', 'Đăng nhập')

    <div class="container-fluid page-header bg-secondary mb-5">
        <div class="header-content d-flex flex-column align-items-center justify-content-center">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
            <div class="breadcrumb d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="separator m-0 px-2">-</p>
                <p class="m-0">@yield('title')</p>
            </div>
        </div>
    </div>

    <div class="container-fluid login-section py-5">
        <div class="row">
            <div class="col-lg-6 col-12 px-0">
                <div class="login-image">
                    <img src="{{ asset('front/img/frame_01.svg') }}" alt="Login Illustration" class="img-fluid">
                    <h4 class="benefit-title mt-4">QUYỀN LỢI THÀNH VIÊN</h4>
                    <ul class="benefit-list">
                        <li><i class="fas fa-check-circle"></i> Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</li>
                        <li><i class="fas fa-check-circle"></i> Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</li>
                        <li><i class="fas fa-check-circle"></i> Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-12 px-0">
                <div class="login-form-container mb-4">
                    <!-- Tab -->
                    <ul class="nav nav-tabs mb-4" id="authTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">ĐĂNG NHẬP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">ĐĂNG KÝ</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="authTabContent">
                        <!-- Tab Đăng nhập -->
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="redirect_uri" value="{{ $redirect_uri ? $redirect_uri : url()->full() }}">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        {!! $alert::my_alert() !!}
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Nhập địa chỉ email *</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="abc@gmail.com" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Mật khẩu *</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-primary font-weight-bold text-white">ĐĂNG NHẬP</button>
                                        <a href="{{ route('forgot-user-password') }}" class="forgot-password">Quên mật khẩu?</a>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <p class="text-center mb-3">Hoặc đăng nhập bằng</p>
                                        <a href="#" class="btn btn-google btn-block mb-2"><i class="fab fa-google"></i> ĐĂNG NHẬP BẰNG GOOGLE</a>
                                        <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f"></i> ĐĂNG NHẬP BẰNG FACEBOOK</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Tab Đăng ký -->
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form action="{{ route('registerUser') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-group position-relative">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Họ và tên" value="{{ old('name') }}">
                                        <i class="fas fa-user position-absolute positon-custom"></i>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group position-relative">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="0987123456" maxlength="10" value="{{ old('phone') }}">
                                        <i class="fas fa-phone position-absolute positon-custom"></i>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group position-relative">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="abc@gmail.com" value="{{ old('email') }}">
                                        <i class="fas fa-envelope position-absolute positon-custom"></i>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group position-relative">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Nhập mật khẩu">
                                        <i class="fas fa-lock position-absolute positon-custom"></i>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group position-relative">
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Xác nhận mật khẩu">
                                        <i class="fas fa-lock position-absolute positon-custom"></i>
                                        @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-primary btn-block font-weight-bold text-white">TẠO TÀI KHOẢN</button>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <p class="text-center mb-3">Hoặc đăng nhập bằng</p>
                                        <a href="#" class="btn btn-google btn-block mb-2"><i class="fab fa-google"></i> ĐĂNG NHẬP BẰNG GOOGLE</a>
                                        <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f"></i> ĐĂNG NHẬP BẰNG FACEBOOK</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
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

            &::before {
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

                h1 {
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

                    p {
                        margin: 0;
                        color: #fff;

                        a {
                            color: #fff;
                            text-decoration: none;
                            transition: color 0.3s ease;

                            &:hover {
                                color: #f1c40f;
                            }
                        }
                    }

                    .separator {
                        margin: 0 10px;
                        color: #fff;
                    }
                }
            }
        }

        .login-section {
            width: 853px;
            margin: 0 auto;
            padding: 50px 0;

            .login-image {
                padding-bottom: 20px;
                text-align: center;
                background: #EEEEEE;

                img {
                    max-width: 100%;
                    width: 100%;
                    height: auto;
                }

                .benefit-title {
                    color: #EE4D2D;
                    font-size: 16px;
                    font-weight: 600;
                    margin-bottom: 20px;
                    padding: 0 20px;
                    text-align: left;
                }

                .benefit-list {
                    list-style: none;
                    padding: 0 20px;
                    margin-bottom: 20px;

                    li {
                        text-align: justify;
                        font-size: 14px;
                        color: #333;
                        margin-bottom: 10px;
                        display: flex;
                        align-items: center;

                        i {
                            color: #28a745;
                            margin-right: 10px;
                        }
                    }
                }
            }

            .login-form-container {
                height: 100%;
                background: #fff;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                width: 100%;
                transition: transform 0.3s ease;

                .nav-tabs {
                    border-bottom: 2px solid #ddd;
                    margin-bottom: 30px;

                    .nav-link {
                        font-size: 1.2rem;
                        font-weight: 600;
                        color: #666;
                        border: none;
                        padding: 10px 20px;
                        text-transform: uppercase;

                        &.active {
                            color: #6e8efb;
                            border-bottom: 3px solid #6e8efb;
                        }

                        &:hover {
                            color: #6e8efb;
                        }
                    }
                }

                .form-group {
                    margin-bottom: 20px;

                    label {
                        font-size: 1rem;
                        font-weight: 500;
                        color: #555;
                        margin-bottom: 8px;
                        display: block;
                    }

                    .form-control {
                        height: 50px;
                        border-radius: 8px;
                        border: 1px solid #ddd;
                        padding: 0 15px;
                        font-size: 1rem;
                        color: #333;
                        transition: border-color 0.3s ease, box-shadow 0.3s ease;

                        &:focus {
                            border-color: #6e8efb;
                            box-shadow: 0 0 8px rgba(110, 142, 251, 0.2);
                            outline: none;
                        }

                        &.is-invalid {
                            border-color: #dc3545;
                        }
                    }

                    .position-relative {
                        i {
                            right: 5%;
                            top: 70%;
                            transform: translateY(-50%);
                            color: #999;
                        }
                    }

                    .alert-danger {
                        margin-top: 5px;
                        font-size: 0.9rem;
                        padding: 8px;
                        border-radius: 5px;
                    }

                    .btn-primary {
                        background: #6e8efb;
                        border: none;
                        padding: 12px;
                        font-size: 1.1rem;
                        font-weight: 600;
                        border-radius: 8px;
                        transition: background 0.3s ease, transform 0.3s ease;

                        &:hover {
                            background: #5a78e3;
                            transform: translateY(-2px);
                        }
                    }

                    .forgot-password,
                    .register-link {
                        color: #6e8efb;
                        text-decoration: none;
                        font-weight: 500;
                        font-size: 0.9rem;

                        &:hover {
                            color: #5a78e3;
                            text-decoration: underline;
                        }
                    }

                    .btn-google {
                        background: #ff4d4d;
                        color: #fff;
                        border: none;
                        padding: 12px;
                        font-size: 1rem;
                        font-weight: 600;
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: background 0.3s ease;

                        i {
                            margin-right: 10px;
                        }

                        &:hover {
                            background: #e63939;
                        }
                    }
                    .positon-custom{
                        top: 35%;
                        right: 35px;
                    }

                    .btn-facebook {
                        background: #4267b2;
                        color: #fff;
                        border: none;
                        padding: 12px;
                        font-size: 1rem;
                        font-weight: 600;
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: background 0.3s ease;

                        i {
                            margin-right: 10px;
                        }

                        &:hover {
                            background: #365899;
                        }
                    }
                }
            }
        }

        @media (max-width: 768px) {
            .login-form-container {
                padding: 20px;
            }

            .page-header {
                min-height: 200px;

                .header-content {
                    h1 {
                        font-size: 2rem;
                    }

                    .breadcrumb {
                        font-size: 0.9rem;
                    }
                }
            }
        }
    </style>
@endsection
