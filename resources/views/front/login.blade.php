@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Đăng nhập')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid justify-content-center d-flex align-items-center">
    <div class="row px-xl-5">
        <div class="col-lg-12"  style=" width: 971px;">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">@yield('title')</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="redirect_uri" value="{{$redirect_uri ? $redirect_uri : url()->full()}}">
                        <div class="col-md-12 form-group">
                            {!! $alert::my_alert() !!}
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                name="email" placeholder="abc@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Mật khẩu</label>
                            <input class="form-control @error('password') is-invalid @enderror" name="password"
                                type="password" placeholder="">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit"
                                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đăng
                                nhập</button>
                        </div>
                        <div class="col-md-12 form-group">
                            <a href="{{ route('registerUser') }}">Đăng ký ở đây</a> - 
                            <a href="{{ route('forgot-user-password') }}">Quên mật khẩu</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
