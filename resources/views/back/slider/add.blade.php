@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thêm mới ảnh slider')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ url('admin/slider') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group @error('title') has-error @enderror">
                    <label for="name">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="name" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    <label for="=">Nội dung</label>
                    <input name="description" class="form-control" type="text" value="{{ old('description') }}">
                    @error('description')
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
