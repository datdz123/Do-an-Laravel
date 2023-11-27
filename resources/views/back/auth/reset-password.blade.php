<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Tạo lại mật khẩu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('back') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('back') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back') }}/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('back') }}/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>{{ $site->site_name }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><b>Tạo lại mật khẩu</b></p>

            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" disabled class="form-control" placeholder="Email"
                        value="{{ $email }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                @error('email')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                @error('password')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Mật khẩu" value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                @error('password_confirmation')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror

                @if (Session::has('error'))
                    <div class="text-danger">
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="text-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            {{-- <label>
                                <input type="checkbox" name="remember"> Nhớ đăng nhập
                            </label> --}}
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Xác nhận</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
            </form>

            {{-- <div class="social-auth-links text-center">
                <p>- Hoặc -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>
                    Đăng nhập với
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
                    Đăng nhập với
                    Google+</a>
            </div> --}}
            <!-- /.social-auth-links -->

            <a href="{{ route('login') }}">Đăng nhập</a></a><br>
            {{-- <a href="register.html" class="text-center">Đăng kí thành viên mới</a> --}}

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="{{ asset('back') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('back') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('back') }}/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>
