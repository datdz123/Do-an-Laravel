@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Đơn hàng')

<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            {{-- <h3 class="box-title pull-right"> <a class="btn btn-primary" href="">
                    <i class="fa fa-plus-square"></i> Thêm mới</a>
            </h3> --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">


            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Bộ lọc</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-remove"></i></button> --}}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="" class="" style="margin-bottom: 10px" method="GET">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Thời gian từ:</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="date[]" class="form-control pull-right"
                                                    id="datepicker" value="{{ $dateFrom }}">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Đến:</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="date[]" class="form-control pull-right"
                                                    id="datepicker2" value="{{ $dateTo }}">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                </div>

                                {{-- <div class="form-group">
                                    <label for="">Thời gian</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date" class="form-control pull-right"
                                            id="reservation">
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label>Trạng thái đơn hàng</label>
                                    <select name="status" class="form-control">
                                        <option value="">Tất cả</option>
                                        <option {{ $status == 'new' ? 'selected' : '' }} value="new">Đơn hàng mới
                                        </option>
                                        <option {{ $status == 'preparing goods' ? 'selected' : '' }}
                                            value="preparing goods">Đơn hàng đang chuẩn bị</option>
                                        <option {{ $status == 'delivering' ? 'selected' : '' }} value="delivering">Đơn
                                            hàng đang giao</option>
                                        <option {{ $status == 'delivered' ? 'selected' : '' }} value="delivered">Đơn
                                            hàng đã gião</option>
                                        <option {{ $status == 'order has been cancelled' ? 'selected' : '' }}
                                            value="order has been cancelled">Đơn hàng đã hủy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label for="">Giá từ</label>
                                        <div class="input-group">

                                            <input type="text" name="price[]" class="form-control pull-right price"
                                                value="{{ $priceFrom }}">
                                            <div class="input-group-addon">
                                                VND
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="">Đến</label>
                                    <div class="input-group">
                                        <input type="text" name="price[]" class="form-control pull-right price1"
                                            value="{{ $priceTo }}">
                                        <div class="input-group-addon">
                                            VND
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box-footer" style="padding: 0px;">
                            {{-- <input type="hidden" id="removeFt" name="removeFt" value="false"> --}}

                            <button onclick="noremove()" class="btn btn-primary" type="">Tìm kiếm</button>

                            {{-- <button onclick="remove()" class="btn btn-default pull-right">Xóa bộ lọc</button> --}}
                        <a class="btn btn-default pull-right" href="{{route('order')}}">Xóa bộ lọc</a>
                        </div>
                </div>
                </form>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thông tin KH</th>
                        <th>Địa chỉ</th>
                        <th>Thành tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th style="width: 66px" class="pull-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $key => $item)
                        <tr>
                            <td><b>{{ ++ $key }}</b></td>
                            <td>
                                <div class="col-12"> <b>Tên KH: {{ $item->name }}</b></div>
                                <div class="col-12"> <b>Email: {{ $item->email }}</b></div>
                                <div class="col-12"> <b>SĐT: {{ $item->phone }}</b></div>
                            </td>
                            <td>
                                <b>{{ $item->street_address }}, {{ $item->ward }}, {{ $item->district }},
                                    {{ $item->provincial }}</b>
                            </td>
                            {{-- <td> <b>{{ Str::limit($item->note, '25') }}</b> </td> --}}
                            <td>
                                {{-- @php
                                    $main_total = 0;
                                    foreach ($item->orderDetails as $key => $value) {
                                        $main_total += $value->total;
                                    }
                                @endphp --}}
                                {{-- <b> {{ number_format($main_total, 0, '.', '.') }} VND</b> --}}
                                <b> {{ number_format($item->total, 0, '.', '.') }} VND</b>
                            </td>
                            <td>
                                <div class="col-12"> <b>
                                        {{ $item->payment_method == 'payment on delivery' ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' }}
                                    </b></div>
                                @switch($item->payment_status)
                                    @case('paid')
                                        <b>-- Đã thanh toán</b>
                                    @break

                                    @case('unpaid')
                                        <b>-- Chưa thanh toán</b>
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <td>
                                @switch($item->status)
                                    @case('new')
                                        <div class="badge label label-primary">Đơn hàng mới</div>
                                    @break

                                    @case('preparing goods')
                                        <div class="badge label bg-teal">Chuẩn bị hàng</div>
                                    @break

                                    @case('delivering')
                                        <div class="badge label label-info">Đang giao</div>
                                    @break

                                    @case('delivered')
                                        <div class="badge label label-success">Đã giao</div>
                                    @break

                                    @case('order has been cancelled')
                                        <div class="badge label label-danger">Đã bị hủy</div>
                                    @break

                                    @default
                                @endswitch

                            </td>
                            <td>
                                <b>Thời gian: {{ $item->created_at->format('d/m/Y') }}</b>
                            </td>
                            <td class="pull-right">
                                <a title="Chi tiết" data-toggle="tooltip" data-placement="bottom"
                                    style="width: 40px;margin: 1px;" style="width: 40px" class="btn btn-info "
                                    href="{{ route('order.detail', ['id' => $item->id]) }}"><i
                                        class="fa fa-info-circle" aria-hidden="true"></i></a>
                                <form style="display: inline" method="POST" action="{{ route('order.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <a class="btn btn-danger btnDelete" data-id=""
                                        style="width:40px" data-toggle="tooltip" data-placement="bottom"
                                        title="Xóa">
                                        <i class="fa fa-trash-o"></i></a>
                                </form>
                                {{-- <div class="tools">
                                   <a title="Chi tiết" data-toggle="tooltip" data-placement="bottom" class="text-primary" href="">
                                    <i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" href=""><i class="fa fa-trash-o"></i></a>
                                  </div> --}}
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
            // var dataID = $(this).data('id');
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

    {{-- <script>
        //Date range picker
        $('#reservation').daterangepicker()
    </script> --}}
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        $('#datepicker2').datepicker({
            autoclose: true
        })
    </script>


    <script src=" https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script>
        var cleave = new Cleave('.price', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
        var cleave = new Cleave('.price1', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>


    {{-- <script type="text/javascript">
        function remove() {
            $('#removeFt').val('true')
        }

        function norenove() {
            $('#removeFt').val('false')
        }
    </script> --}}

@endsection


@endsection
