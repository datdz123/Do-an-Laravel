@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Nhận xét sản phẩm')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            {{-- <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('product/add') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3> --}}
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="min-width: 222px;">Thông tin Người dùng </th>
                        <th>Thông tin sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th class="pull-right">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productComments as $item)
                        <tr>
                            <td>
                                {{-- <div class="col-12">
                                    <b>Id: {{ $item->user->id }}</b>
                                </div> --}}
                                <div class="col-12">
                                    <b>Tên: {{ $item->user->name }}</b>
                                </div>
                                <div class="col-12">
                                    <b>Email: {{ $item->user->email }}</b>
                                </div>
                                <div class="col-12">
                                    <b>SDT: {{ $item->user->phone }}</b>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        @php
                                            $image = explode(',', $item->product->images);
                                        @endphp
                                        <a href="{{ route('product/update', $item->product_id) }}"><img
                                                class="image_show" src="{{ $image[0] }}" alt=""></a>
                                    </div>
                                    <div class="col-md-9">
                                        <b>Id: {{ $item->product->id }}.</b>
                                    </div>
                                    <div class="col-md-9">
                                        <b>Tên: {{ $item->product->name }}.</b>
                                    </div>
                                    <div class="col-md-9">
                                        <b>Slug: {{ $item->product->slug }}.</b>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-10">
                                    <b>Đánh giá: {{ $item->rating }} <i class="fa fa-star text-yellow"
                                            aria-hidden="true"></i></b>
                                </div>
                                <div class="col-md-10">
                                    <b>Nội dung: {{ $item->messages }}</b>
                                </div>
                            </td>
                            <td>
                                <b>{{ $item->created_at->format('d/m/Y') }}</b>
                            </td>
                            <td class="pull-right">
                                {{-- <a style="width: 40px;margin: 1px;" class="btn btn-primary  " title="Sửa"
                                    data-toggle="tooltip" data-placement="bottom"
                                    href=""><i
                                        class="fa fa-pencil-square-o"></i></a> --}}
                                <form method="POST"
                                    action="{{ route('product.comments.delete', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-danger btnDelete" style="width:40px;margin: 1px;"
                                        data-toggle="tooltip" data-placement="bottom" title="Xóa">
                                        <i class="fa fa-trash-o"></i></a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

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
