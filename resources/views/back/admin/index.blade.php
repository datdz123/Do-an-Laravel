@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Thành viên')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('member.create') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thông tin</th>
                        <th>SĐT</th>
                        <th>Vai trò</th>
                        <th>Quyền</th>
                        <th class="pull-right" style="width: 70px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $key => $item)
                        <tr>
                            <td><b>{{ $key }}</b></td>
                            <td>
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="{{ $item->avatar ? $item->avatar : asset('back/dist/img/adminDefault.jpg') }}"
                                        alt="">
                                    <span class="username"><b> {{ $item->name }}</b></span>
                                    <span class="description"><b> {{ $item->email }}</b></span>
                                </div>
                            </td>
                            <td> <b>{{ $item->phone }}</b></td>
                            <td>
                                @foreach ($item->roles as $i)
                                    @if ($i->name == 'super-admin')
                                        <div class="label bg-red">{{ $i->name }}</div>
                                    @else
                                        <div class="label bg-aqua">{{ $i->name }}</div>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->getAllPermissions() as $i)
                                    <div class="label bg-green">{{ $i->name }}</div>
                                @endforeach
                            </td>
                            <td class="pull-right">
                                <a style="width: 40px;margin: 1px;" class="btn btn-primary  " title="Vai trò"
                                    data-toggle="tooltip" data-placement="bottom"
                                    href="{{ route('member.assignRole', $item->id) }}"><i class="fa fa-flag-o"
                                        aria-hidden="true"></i></a>
                                {{-- <a style="width: 40px;margin: 1px;" class="btn btn-primary  " title="Sửa"
                                    data-toggle="tooltip" data-placement="bottom"
                                    href="{{ route('product/update', $item->id) }}"><i
                                        class="fa fa-pencil-square-o"></i></a> --}}
                                <form style="display: inline" method="POST"
                                    action=" {{ route('member.delete', [$item->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger btnDelete" data-id={{ $item->id }} style="width:40px"
                                        data-toggle="tooltip" data-placement="bottom" title="Xóa">
                                        <i class="fa fa-trash-o"></i></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('back/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function() {
            $('#example1').DataTable()
        })
    </script>

    <script>
        $('.btnDelete').on('click', function(ev) {
            var form = $(this).closest('form');
            ev.preventDefault()
            Swal.fire({
                title: 'Xóa',
                text: "Bạn có chắc muốn xóa mục này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            })
        })
    </script>
@endsection


@endsection
