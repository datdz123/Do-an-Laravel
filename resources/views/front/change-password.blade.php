@extends('front/layouts/masterlayout')
@section('content')
@section('title', __('Đổi mật khẩu'))
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">{{ __('Home') }}</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>

<div class="container-fluid justify-content-center d-flex align-items-center">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">@yield('title')</h4>
                <form action="" method="POST">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>{{ __('Mật khẩu cũ') }}</label>
                            <input class="form-control @error('oldPassword') is-invalid @enderror" type="password"
                                name="oldPassword" value="{{ old('email') }}">
                            @error('oldPassword')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <label>{{ __('Mật khẩu mới') }}</label>
                            <input class="form-control @error('password') is-invalid @enderror" name="password"
                                type="password" placeholder="">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <label>{{ __('Nhập lại mật khẩu mới') }}</label>
                            <input class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                                type="password" placeholder="">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit"
                                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">{{ __('Thay đổi') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

@endsection