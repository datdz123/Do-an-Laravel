@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Cập nhật Banner')

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
        <form method="POST" action="{{ route('banner.update', ['banner' => $banner->id]) }}" role="form">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group @error('title') has-error @enderror">
                    <label for="">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id=""
                        value="{{ old('title') ? old('title') : $banner->title }}">
                    @error('title')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('content') has-error @enderror">
                    <label for="">Nội dung</label>
                    <input name="content" class="form-control" type="text"
                        value="{{ old('content') ? old('content') : $banner->content }}">
                    @error('content')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group @error('link') has-error @enderror">
                    <label for="">Link</label>
                    <input name="link" class="form-control" type="text" value="{{ old('link') ? old('link') : $banner->link }}">
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
                        <input value="{{ $banner->images }}" name="images" id="thumbnail" class="form-control" type="text" name="filepath">
                    </div>
                    @error('images')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div id="holder" style="margin-top:10px">
                        @php
                            $images = explode(',', $banner->images);
                        @endphp
                            <img style="height: 80px; margin: 2px;" src="{{ $images[0] }}" alt="">
                    </div>

                </div>
                <div class="form-group @error('size') has-error @enderror">
                    <label for="=">Kích cỡ</label>
                    <select name="size" class="form-control" style="width: 100%;">
                        <option @if ($banner->size == 6) selected @endif value="6"> 50 %</option>
                        <option @if ($banner->size == 12) selected @endif value="12"> 100 %</option>
                    </select>
                    @error('size')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        <input type="radio" name="status" value="active" class="flat-red"
                            @if ($banner->status == 'active') checked @endif>
                        Kích hoạt
                    </label>
                    <label>
                        <input type="radio" name="status" value="inactive" class="flat-red"
                            @if ($banner->status == 'inactive') checked @endif>
                        Không kích hoạt
                    </label>
                </div>
            </div>
            <!-- /.box-body -->



            <div class="box-footer">
                <button id="confirm" type="submit" class="btn btn-primary">Xác nhận</button>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#confirm').on('click', function(ev) {
            var form = $(this).closest('form');
            ev.preventDefault()
            Swal.fire({
                title: 'Cập nhật',
                text: "Bạn có muốn cập nhật lại hay không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            })
        })
    </script>
@endsection

@endsection
