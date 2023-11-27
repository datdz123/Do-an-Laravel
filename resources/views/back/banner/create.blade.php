@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thêm mới Banner')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('banner.index') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('banner.store') }}" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group @error('title') has-error @enderror">
                    <label for="">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id=""
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('content') has-error @enderror">
                    <label for="">Nội dung</label>
                    <input name="content" class="form-control" type="text" value="{{ old('content') }}">
                    @error('content')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('link') has-error @enderror">
                    <label for="">Link</label>
                    <input name="link" class="form-control" type="text" value="{{ old('link') }}">
                    @error('link')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('images') has-error @enderror">
                    <label for="">Ảnh</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                        </span>
                        <input name="images" id="thumbnail" class="form-control" type="text" name="filepath">
                    </div>
                    @error('images')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                </div>
                <div class="form-group @error('size') has-error @enderror">
                    <label for="=">Kích cỡ</label>
                    <select name="size" class="form-control" style="width: 100%;">
                        <option value="6"> 50 %</option>
                        <option value="12"> 100 %</option>
                    </select>
                    @error('size')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        <input type="radio" name="status" value="active" class="flat-red" checked>
                        Kích hoạt
                    </label>
                    <label>
                        <input type="radio" name="status" value="inactive" class="flat-red">
                        Không kích hoạt
                    </label>
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
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>

    <script src="{{ asset('back/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            radioClass: 'iradio_flat-blue'
        })
    </script>
@endsection

@endsection
