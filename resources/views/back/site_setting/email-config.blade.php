@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Cấu hình gửi email')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
        </div>
        <form method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Cảnh báo!</h4>
                    <span>Để tránh những sai xót không đáng có, bạn chỉ nên sửa MAIL_USERNAME, MAIL_PASSWORD.</span>
                </div>

                <div class="form-group">
                    <label for="name">MAIL_MAILER</label>
                    <input type="text" name="MAIL_MAILER" class="form-control" value="">
                    @error('MAIL_MAILER')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">MAIL_HOST</label>
                    <input type="text" name="MAIL_HOST" class="form-control" value="">
                    @error('MAIL_HOST')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">MAIL_PORT</label>
                    <input type="text" name="MAIL_PORT" class="form-control" value="">
                    @error('MAIL_PORT')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">MAIL_USERNAME</label>
                    <input type="text" name="MAIL_USERNAME" class="form-control" value="">
                    @error('MAIL_USERNAME')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">MAIL_PASSWORD</label>
                    <input type="text" name="MAIL_PASSWORD" class="form-control" value="">
                    @error('MAIL_PASSWORD')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">MAIL_ENCRYPTION</label>
                    <input type="text" name="MAIL_ENCRYPTION" class="form-control" value="">
                    @error('MAIL_ENCRYPTION')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>

            </div>
            <div class="box-footer">

                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')

@endsection

@endsection
