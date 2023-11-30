@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Ảnh slider')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('slider/add') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Nội dung</th>
                        <th class="pull-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slider as $item)
                        @php
                            $image = explode(',', $item->images);
                        @endphp
                        <tr>
                            <td><img class="object-fit-cover aspect-ratio-16-9" width="200" src="{{ $image[0] }}"></td>
                            <td>  <div class="col-12">
                                 <b>- Tiêu đề: {{ $item->title }}</b>
                                 </div>
                                 <div class="col-12">
                                 <b>- Nội dung: {{ $item->description }}</b>
                                 </div></td>
                            <td class="pull-right">
                                <a style="width: 40px" class="btn btn-primary "
                                    href="
                                {{ route('slider/update', ['id' => $item->id]) }}
                                "><i
                                        class="fa fa-pencil-square-o"></i></a>
                                <a style="width: 40px" class="btn btn-danger  delete"
                                    href="
                                    {{ route('slider/delete', ['id' => $item->id]) }}"><i
                                        class="fa fa-trash"></i></a>
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
                    location.href = self.attr('href')
                }
            })
        })
    </script>

    @include('sweetalert::alert')
@endsection


@endsection
