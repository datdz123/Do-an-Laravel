@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thêm mới thành viên')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('member') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{route('member.store')}}" role="form">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group ">
                    <label for="">Ảnh đại diện</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                        </span>
                        <input name="avatar" id="thumbnail" class="form-control" type="text" name="filepath">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>

                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Họ và tên (*)</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Lê Đăng B"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    <label for="">Địa chỉ email (*)</label>
                    <input class="form-control" id="slug" type="text" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('phone') has-error @enderror">
                    <label for="">Số điện thoại (*)</label>
                    <input class="form-control" id="slug" type="text" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <label for="">Mật khẩu (*)</label>
                    <input class="form-control" id="slug" type="password" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('password_confirmation') has-error @enderror">
                    <label for="">Nhập lại mật khẩu (*)</label>
                    <input class="form-control" id="slug" type="password" name="password_confirmation"
                        value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@section('js')

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            // filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>

@endsection

@endsection
