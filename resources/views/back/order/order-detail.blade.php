@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Chi tiết đơn hàng')

<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@yield('title')</h3>
            <h3 class="box-title pull-right"> <a class="btn btn-primary" href="{{ route('order') }}">
                    <i class="fa fa-truck"></i> Các đơn hàng</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="">
                <form method="POST" action="{{ route('order.edit') }}" class="form-horizontal">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <div class="box-body col-md-12">
                        <label for="">Trạng thái đơn hàng -
                            @switch($order->status)
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
                        </label>
                        <select {{ $order->status == 'order has been cancelled' ? 'disabled' : '' }} name="status"
                            class="form-control">
                            <option {{ $order->status == 'new' ? 'selected' : '' }} value="new"> Đơn hàng mới
                            </option>
                            <option {{ $order->status == 'preparing goods' ? 'selected' : '' }} value="preparing goods">
                                Đang chuẩn bị </option>
                            <option {{ $order->status == 'delivering' ? 'selected' : '' }} value="delivering"> Đang giao
                            </option>
                            <option {{ $order->status == 'delivered' ? 'selected' : '' }} value="delivered"> Đã giao
                            </option>
                            <option {{ $order->status == 'order has been cancelled' ? 'selected' : '' }}
                                value="order has been cancelled"> Đã hủy</option>
                        </select>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer col-md-12">
                        <button type="button" class="btn btn-default">Hủy</button>
                        <button {{ $order->status == 'order has been cancelled' ? 'disabled' : '' }} type="submit"
                            class="btn btn-info">Xác nhận</button>

                        <a  href="{{route('order.print',['id'=>$order->id])}}" target="_blank"  class="btn btn-success pull-right"><i class="fa fa-save"
                             aria-hidden="true"></i> Xuất Hóa đơn</a>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <div id="excel">
                <h5 class="box-title">Thông tin</h5>
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id: </th>
                            <td><b>{{ $order->id }} </b></td>
                        </tr>
                        <tr>
                            <th>Tên khách hàng: </th>
                            <td><b>{{ $order->name }} </b></td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td><b>{{ $order->email }} </b></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại: </th>
                            <td><b>{{ $order->phone }} </b></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ: </th>
                            <td><b>{{ $order->street_address }}, {{ $order->ward }}, {{ $order->district }},
                                    {{ $order->provincial }}</b></td>
                        </tr>
                        <tr>
                            <th>Ghi chú: </th>
                            <td><b>{{ $order->note }} </b></td>
                        </tr>
                        <tr>
                            <th>Phương thức thanh toán: </th>
                            <td>
                                <b>{{ $order->payment_method == 'payment on delivery' ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' }}
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Tình trạng thanh toán: </th>
                            <td>
                                <b>{{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Trạng thái đơn hàng: </th>
                            <td>
                                <b>
                                    @switch($order->status)
                                        @case('new')
                                            <div>Đơn hàng mới</div>
                                        @break

                                        @case('preparing goods')
                                            <div>Chuẩn bị hàng</div>
                                        @break

                                        @case('delivering')
                                            <div>Đang giao</div>
                                        @break

                                        @case('delivered')
                                            <div>Đã giao</div>
                                        @break

                                        @case('order has been cancelled')
                                            <div>Đã bị hủy</div>
                                        @break

                                        @default
                                    @endswitch
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Thời gian: </th>
                            <td><b>{{ $order->created_at->format('H:i:s - d/m/Y') }}</b></td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <h5 class="box-title">Danh sách sản phẩm</h5>
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Tên sản phẩm</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($order_detail as $stt => $item)
                            @php
                                $product = \App\Models\Product::find($item['product_id']);
                                $total += $item->total;
                            @endphp
                            <tr>
                                <td><b>{{ ++$stt }}</b></td>
                                <td><b>{{ $item->product_id }}</b></td>
                                <td><b>{{ $product->name }}</b></td>
                                <td><b>{{ $item->size }}</b></td>
                                <td><b>{{ $item->qty }}</b></td>
                                <td><b>{{ number_format($item->total, 0, '.', '.') }} VND</b></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6"><b>Tổng: {{ number_format($total, 0, '.', '.') }} VND</b></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- /.box-body -->

        <div class="box box-default">
            <div class="box-header with-border">
                <form id="formDelete" method="POST" action="{{ route('order.delete') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$order->id}}">
                    <a class="btn btn-danger btnDelete" data-id="" style="" data-toggle="tooltip"
                        data-placement="bottom" title="Xóa">
                        <i class="fa fa-trash-o"></i> Xóa đơn hàng</a>
                </form>
            </div>

        </div>

    </div>
</section>


@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
  $('.btnDelete').on('click', function(ev) {
            var form = $(this).closest('#formDelete');
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
