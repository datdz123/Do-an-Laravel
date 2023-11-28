@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Cài đặt trang web')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
        </div>
        <form method="POST" action="" role="form">
            <input type="hidden" name="id" value="{{isset($site_setting->id) ? $site_setting->id : ''}}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Tên trang web</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $site->site_name }}">
                    @error('site_name')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Tiêu đề trang web</label>
                    <input type="text" name="site_title" class="form-control" value="{{ $site->site_title }}">
                    @error('site_title')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Keywords</label>
                    <input type="text" name="site_keywords" class="form-control" value="{{ $site->site_keywords }}">
                    @error('site_keywords')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">icon trang web</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                        </span>
                        <input name="site_icon" id="thumbnail" class="form-control" type="text"
                            value="{{ $site->site_icon }}">
                    </div>
                    @error('site_icon')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    @php
                        $image = explode(',', $site->site_icon);
                    @endphp
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        <img style="height: 80px; margin: 2px;" src="{{ $image[0] }}" alt="">
                    </div>

                </div>

                <div class="form-group">
                    <label for="name">Email liên hệ</label>
                    <input type="email" name="site_email" class="form-control" value="{{ $site->site_email }}">
                    @error('site_email')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Số điện thoại liên hệ</label>
                    <input type="text" name="site_phone" class="form-control" value="{{ $site->site_phone }}">
                    @error('site_phone')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Địa chỉ liên hệ</label>
                    <input type="text" name="site_address" class="form-control" value="{{ $site->site_address }}">
                    @error('site_address')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Link facebook</label>
                    <input type="text" name="site_link_facebook" class="form-control"
                        value="{{ $site->site_link_facebook }}">
                    @error('site_link_facebook')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Link youtube</label>
                    <input type="text" name="site_link_youtube" class="form-control"
                        value="{{ $site->site_link_youtube }}">
                    @error('site_link_youtube')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Link instagram</label>
                    <input type="text" name="site_link_instagram" class="form-control"
                        value="{{ $site->site_link_instagram }} ">
                    @error('site_link_instagram')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Mô tả trang web</label>
                    <textarea class="form-control" name="site_description" id="">{{ $site->site_description }}</textarea>
                    @error('site_description')
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        };
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
    </script>
@endsection

@endsection