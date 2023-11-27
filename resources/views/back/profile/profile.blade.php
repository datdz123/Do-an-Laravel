@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thông tin')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            {{-- <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ url('admin/products') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3> --}}
        </div>
        <!-- /.box-header -->

        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom" id="">
                    <ul class="nav nav-tabs">
                        <li class="active"><a id="information" href="#tab_1" data-toggle="tab">Thông tin cá nhân</a>
                        </li>
                        <li><a href="#tab_2" data-toggle="tab">Thay đổi thông tin</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Thay đổi mật khẩu</a></li>
                        {{-- <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                Dropdown <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another
                                        action</a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else
                                        here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated
                                        link</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="box-bodbox-profile">
                                        @if (Auth::user()->avatar)
                                            <img class="profile-user-img img-responsive img-circle"
                                                src="{{ Auth::user()->avatar }}" alt="User profile picture">
                                        @else
                                            <img class="profile-user-img img-responsive img-circle"
                                                src="{{ asset('back/dist/img/adminDefault.jpg') }}"
                                                alt="User profile picture">
                                        @endif

                                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Địa chỉ email: </th>
                                                <td> {{ Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Số điện thoại: </th>
                                                <td> {{ Auth::user()->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Vai trò: </th>
                                                <td>
                                                    @foreach (Auth::user()->roles as $i)
                                                        @if ($i->name == 'super-admin')
                                                            <div class="label bg-red">{{ $i->name }}</div>
                                                        @else
                                                            <div class="label bg-aqua">{{ $i->name }}</div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Quyền: </th>
                                                <td>
                                                    @foreach (Auth::user()->getAllPermissions() as $i)
                                                    <div class="label bg-green">{{ $i->name }}</div>
                                                @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <form class="form-horizontal margin" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="box-bodbox-profile">
                                            <a href="" id="lfm" data-input="thumbnail"
                                                data-preview="holder">
                                                {{-- <div id="holder"></div> --}}
                                                <img id="choose_photo"
                                                    class="profile-user-img img-responsive img-circle"
                                                    src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('back/dist/img/adminDefault.jpg') }}"
                                                    alt="User profile picture">
                                            </a>
                                            <input name="avatar" id="thumbnail" class="form-control" type="hidden"
                                                value="{{ Auth::user()->avatar }}">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Họ và tên</label>

                                    <div class="col-sm-10">
                                        <input name="name" type="name" class="form-control" id="inputName"
                                            placeholder="Họ và tên" value="{{ Auth::user()->name }}">
                                        <div class="text-danger name"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control" id="inputEmail"
                                            placeholder="Email" value="{{ Auth::user()->email }}">
                                        <div class="text-danger email"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Số điện thoại</label>

                                    <div class="col-sm-10">
                                        <input name="phone" type="text" class="form-control"
                                            placeholder="Số điện thoại" value="{{ Auth::user()->phone }}">
                                        <div class="text-danger phone"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input name="check1" type="checkbox"> Xác nhận
                                            </label>
                                        </div>
                                        <div class="text-danger check1"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="btnChangeProfile" type="button" class="btn btn-primary">Đồng ý</button>
                                    <button type="button" class="btn btn-default cancel">Hủy</button>

                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <form class="form-horizontal margin" method="POST">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mật khẩu cũ</label>

                                    <div class="col-sm-10">
                                        <input name="oldPassword" type="password" class="form-control"
                                            placeholder="" value="">
                                        <div class="text-danger oldPassword"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mật khẩu mới</label>

                                    <div class="col-sm-10">
                                        <input name="password" type="password" class="form-control" placeholder=""
                                            value="">
                                        <div class="text-danger password"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Xác nhận mật khẩu
                                        mới</label>

                                    <div class="col-sm-10">
                                        <input name="password_confirmation" type="password" class="form-control"
                                            placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input name="check2" type="checkbox"> Xác nhận
                                            </label>
                                        </div>
                                        <div class="text-danger check2"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="btnChangePassword" type="button" class="btn btn-primary">Đồng
                                        ý</button>
                                    <button type="button" class="btn btn-default cancel">Hủy</button>

                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
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
    <script>
        $('#thumbnail').change(function() {
            var photo = $('#thumbnail').val()
            $('#choose_photo').attr("src", photo);
        })
    </script>

    <script>
        $('#btnChangeProfile').click(function(e) {
            e.preventDefault()
            var url = "{{ Request::url() }}"
            var _token = $('input[name="_token"]').val()
            var admin_id = {{ Auth::user()->id }}
            var name = $('input[name="name"]').val()
            var avatar = $('input[name="avatar"]').val()
            var email = $('input[name="email"]').val()
            var phone = $('input[name="phone"]').val()
            if ($('input[name="check1"]').is(":checked")) {
                var check1 = 'on'
            } else {
                var check1 = 'off'
            }
            // var check1 = $('input[name="check1"]').val()
            $.ajax({
                url: "{{ route('edit_profile') }}",
                method: "POST",
                data: {
                    admin_id: admin_id,
                    name: name,
                    avatar: avatar,
                    email: email,
                    phone: phone,
                    _token: _token,
                    check1: check1
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.errors) {
                        $(".name").html(``);
                        $(".phone").html(``);
                        $(".email").html(``);
                        $(".check1").html(``);

                        let resp = response.errors;
                        for (index in resp) {
                            $("." + index).html(`${resp[index]}`);
                        }
                    }
                    if (response.success) {
                        let resp = response.success
                        Swal.fire({
                            title: `${resp['success']}`,
                            icon: `${Object.keys(resp)[0]}`,
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        $('#information').click()
                        $("#tab_1").load(url + " #tab_1")

                        $(".name").html(``);
                        $(".phone").html(``);
                        $(".email").html(``);
                        $(".check1").html(``);
                    }

                },
            });
        })
    </script>

    <script>
        $('#btnChangePassword').click(function(e) {
            e.preventDefault()
            var url = "{{ Request::url() }}"
            var _token = $('input[name="_token"]').val()
            var admin_id = {{ Auth::user()->id }}
            var oldPassword = $('input[name="oldPassword"]').val()
            var password = $('input[name="password"]').val()
            var password_confirmation = $('input[name="password_confirmation"]').val()
            if ($('input[name="check2"]').is(":checked")) {
                var check2 = 'on'
            } else {
                var check2 = 'off'
            }
            $.ajax({
                url: "{{ route('profile.changePassword') }}",
                method: "POST",
                data: {
                    admin_id: admin_id,
                    oldPassword: oldPassword,
                    password: password,
                    password_confirmation: password_confirmation,
                    _token: _token,
                    check2: check2
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.errors) {
                        $(".password").html(``);
                        $(".oldPassword").html(``);
                        $(".password_confirmation").html(``);
                        $(".check2").html(``);

                        let resp = response.errors;
                        for (index in resp) {
                            $("." + index).html(`${resp[index]}`);
                        }
                    }
                    if (response.success) {
                        $(".password").html(``);
                        $(".oldPassword").html(``);
                        $(".password_confirmation").html(``);
                        let resp = response.success
                        Swal.fire({
                            title: `${resp['success']}`,
                            icon: `${Object.keys(resp)[0]}`,
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        $('#information').click()
                        $("#tab_1").load(url + " #tab_1")


                    }

                },
            });
        })
    </script>

    <script>
        $('.cancel').click(function(e) {
            e.preventDefault()
            window.location.reload()
        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@endsection
