@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Chỉnh sửa vai trò')

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> @yield('title') </h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('member.roles') }}">
                    <i class="fa fa-list"></i> Danh sách</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('member.roles.update', ['id' => $role->id]) }}" role="form">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Tên (*)</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Tên quyền ..."
                        value="{{ old('name') ? old('name') : $role->name }}">
                    @error('name')
                        <div class="text-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    @php
                        $arrPermissions = [];
                    @endphp
                    @foreach ($role->permissions as $item)
                        @php
                            $arrPermissions[] = $item->name;
                        @endphp
                    @endforeach
                    @foreach ($permissions as $item)
                        <!-- checkbox -->
                        <label style="margin-right: 15px">
                            <input @if (in_array($item->name, $arrPermissions)) checked @endif type="checkbox" class="flat-red"
                              name="permission[]"  value="{{ $item->name }}">
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
