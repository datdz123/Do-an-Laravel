@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Người dùng đăng ký')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            {{-- <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('product_categories/add') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3> --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Ngày đăng ký</th>
                        <th class="pull-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td> <b>{{ $item->name }}</b></td>
                            <td> <b>{{ $item->email }}</b></td>
                            <td> <b>{{ $item->phone }}</b></td>
                            <td><b>{{$item->created_at->format('d/m/Y')}}</b></td>
                            <td class="pull-right">
                                <form method="POST" action=" {{ route('users.delete', [$item->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger btnDelete"
                                        style="width:40px;margin: 1px;" data-toggle="tooltip" data-placement="bottom"
                                        title="Xóa">
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
    @include('sweetalert::alert')
@endsection


@endsection
