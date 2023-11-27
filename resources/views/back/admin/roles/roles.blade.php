@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Vai trò')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('member.roles.create') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Các quyền</th>
                        <th style="width: 66px;" class="pull-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $item)
                        <tr>
                            <td><b>{{ $key }}</b></td>
                            <td> <b>{{ $item->name }}</b></td>
                            <td>
                                @foreach ($item->getAllPermissions() as $i)
                                    <div class="label bg-green">{{ $i->name }}</div>
                                @endforeach
                            </td>
                            <td class="pull-right">
                                <a style="width: 40px;margin: 1px;" class="btn btn-primary  " title="Sửa"
                                    data-toggle="tooltip" data-placement="bottom"
                                    href="{{ route('member.roles.edit', $item->id) }}"><i
                                        class="fa fa-pencil-square-o"></i></a>
                                <form style="display: inline" method="POST"
                                    action=" {{ route('member.roles.destroy', [$item->id]) }} ">
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
