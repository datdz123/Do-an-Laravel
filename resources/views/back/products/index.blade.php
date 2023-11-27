@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Danh sách sản phẩm')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('product/add') }}">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ảnh </th>
                        <th>Thông tin</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Đánh giá</th>
                        <th>Trạng thái</th>
                        <th class="pull-right">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        @php
                            $image = explode(',', $item->images);
                        @endphp
                        <tr>
                            <td><img class="image_show" src="{{ $image[0] }}">
                            </td>
                            <td>
                                <div class="col-12">
                                    <b>Id: {{ $item->id }}</b>
                                </div>
                                <div class="col-12">
                                    <b>Tên: {{ $item->name }}</b>
                                </div>
                                <div class="col-12">
                                    <b>Danh mục: {{ $item->productCategory->name }}</b>
                                </div>
                              
                            </td>
                            <td>
                                <div class="col-12">
                                    <b>Giá: {{ number_format($item->price, 0, '.', '.') }} VND </b>
                                </div>
                                <div class="col-12">
                                    <b>Giá khuyến mãi: {{$item->discount ? number_format($item->discount, 0, '.', '.') .' VND' : 'không' }}  </b>
                                </div>
                            </td>
                            <td>
                                <b>{{ $item->qty }}</b>
                            </td>
                            <td>
                                @php
                                    // tính rating
                                    $avgRating = 0;
                                    $sumRating = array_sum(array_column($item->productComments->toArray(), 'rating'));
                                    $countRating = count($item->productComments);
                                    if ($countRating != 0) {
                                        $avgRating = $sumRating / $countRating;
                                    }
                                @endphp
                                @if (count($item->productComments) != 0)
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i - 0.5 == $avgRating)
                                        <i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
                                        @elseif($i <= $avgRating)
                                        <i class="fa fa-star text-yellow" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-star-o text-yellow" aria-hidden="true"></i>
                                        @endif
                                    @endfor
                                @else
                                    @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star text-yellow" aria-hidden="true"></i>
                                    @endfor
                                @endif

                                ({{ count($item->productComments) }} Nhập xét)
                            </td>
                            <td>
                                @if ($item->status == 'active')
                                    <div class="badge label label-success"><i class="fa fa-check"
                                            aria-hidden="true"></i> {{$item->status}}</div>
                                @else
                                    <div class="badge label label-danger"><i class="fa fa-times" aria-hidden="true"></i>
                                        {{$item->status}}</div>
                                @endif
                            </td>
                            <td class="pull-right">
                                <a style="width: 40px" class="btn btn-primary  " title="Sửa"
                                    data-toggle="tooltip" data-placement="bottom"
                                    href="{{ route('product/update', $item->id) }}"><i
                                        class="fa fa-pencil-square-o"></i></a>
                                <form style="display: inline" method="POST" action=" {{ route('product/delete', [$item->id]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger btnDelete" data-id={{ $item->id }}
                                        style="width:40px" data-toggle="tooltip" data-placement="bottom"
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
        // $(document).ready(function() {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        $('.btnDelete').on('click', function(ev) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
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
