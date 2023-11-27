@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Vai trò thành viên')

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
        <form method="POST" action="{{route('member.post_assignRole',['id' => $admin->id])}}" role="form">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm"
                            src="{{ $admin->avatar }}" alt="">
                        <span class="username"><b> {{ $admin->name }}</b></span>
                        <span class="description"><b> {{ $admin->email }}</b></span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    @php
                        $arr = [];
                    @endphp
                    @foreach ( $admin->roles as $item)
                        @php
                            $arr[] = $item->name;
                        @endphp
                    @endforeach
                    @foreach ($roles as $item)
                        <!-- checkbox -->
                        <label style="margin-right: 15px">
                            <input  @if (in_array($item->name, $arr)) checked @endif type="checkbox" class="flat-red"
                              name="roles[]"  value="{{ $item->name }}">
                            <span>{{ $item->name }}</span>
                        </label>
                    @endforeach
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#confirm').on('click', function(ev) {
            var form = $(this).closest('form');
            ev.preventDefault()
            Swal.fire({
                title: 'Đồng ý',
                text: "Đồng ý cập nhật vai trò ?",
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

    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('back/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })
    </script>
@endsection

@endsection
