@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Banner')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('banner.create') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th style="width: 300px">Nội dung</th>
                        <th style="width: 300px">Link</th>
                        <th>Kích cỡ</th>
                        <th>Trạng thái</th>
                        <th class="pull-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $item)
                        @php
                            $image = explode(',', $item->images);
                        @endphp
                        <tr>
                            <td><img style=" width: 100%; height: 88px; object-fit: cover" src="{{ $image[0] }}">
                            </td>
                            <td>
                                <div class="col-12">
                                    <b>- Tiêu đề: {{ $item->title }}</b>
                                </div>
                                <div class="col-12">
                                    <b>- Nội dung: {{ $item->content }}</b>
                                </div>
                                <div class="col-12">

                                </div>
                            </td>
                            <td> <b>{{ $item->link }}</b></td>
                            <td><b>
                                    @if ($item->size == 6)
                                        50%
                                    @else
                                        100%
                                    @endif
                                </b></td>
                            <td>
                                <div class="badge label label-{{ $item->status == 'active' ? 'success' : 'danger' }}">
                                    <i class="fa fa-{{ $item->status == 'active' ? 'check' : 'times' }}"
                                        aria-hidden="true"></i> {{ $item->status }}
                                </div>
                            </td>
                            <td class="pull-right">
                                <a style="width: 40px" class="btn btn-primary  " title="Sửa" data-toggle="tooltip"
                                    data-placement="bottom" href="{{ route('banner.edit', [$item->id]) }}"><i
                                        class="fa fa-pencil-square-o"></i></a>
                                <form style="display: inline" method="POST"
                                    action=" {{ route('banner.destroy', ['banner' => $item->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger delete" data-id={{ $item->id }} style="width:40px"
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
        $('.delete').on('click', function(ev) {
            var form = $(this).closest('form');
            ev.preventDefault()
            var self = $(this)
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
