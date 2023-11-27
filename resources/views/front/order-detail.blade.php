@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Chi tiết đơn hàng')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- /.box-header -->
<div class="container-fluid justify-content-center">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="mb-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="box-title">Thông tin đơn hàng</h5>
                        @switch($order->status)
                            @case('new')
                                <div class=" text-primary">Đơn hàng mới</div>
                            @break

                            @case('preparing goods')
                                <div class=" text-primary">Shop đang chuẩn bị hàng</div>
                            @break

                            @case('delivering')
                                <div class=" text-info">Đang giao hàng</div>
                            @break

                            @case('delivered')
                                <div class=" text-success">Đã giao hàng - hoàn thành</div>
                            @break

                            @case('order has been cancelled')
                                <div class=" text-danger">Đơn hàng đã hủy</div>
                            @break

                            @default
                        @endswitch
                    </div>
                    @auth
                    <div class="col-lg-6 text-right">
                        <a href="{{ route('order.user', Auth::user()->id) }}" class="btn btn-primary">Danh sách đơn
                            hàng</a>
                    </div>
                        
                    @endauth
                </div>

                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng: </th>
                            <td>{{ $order->id }} </td>
                        </tr>
                        <tr>
                            <th>Tên khách hàng: </th>
                            <td>{{ $order->name }} </td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td>{{ $order->email }} </td>
                        </tr>
                        <tr>
                            <th>Số điện thoại: </th>
                            <td>{{ $order->phone }} </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ: </th>
                            <td>{{ $order->street_address }}, {{ $order->ward }}, {{ $order->district }},
                                {{ $order->provincial }} </td>
                        </tr>
                        <tr>
                            <th>Ghi chú: </th>
                            <td>{{ $order->note }} </td>
                        </tr>
                        <tr>
                            <th>Phương thức thanh toán: </th>
                            <td>
                                {{ $order->payment_method == 'payment on delivery' ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' }}

                            </td>
                        </tr>
                        <tr>
                            <th>Tình trạng thanh toán: </th>
                            <td>
                                {{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}

                            </td>
                        </tr>
                        <tr>
                            <th>Trạng thái đơn hàng: </th>
                            <td>

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

                            </td>
                        </tr>
                        <tr>
                            <th>Thời gian: </th>
                            <td>{{ $order->created_at->format('H:i:s - d/m/Y') }} </td>
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
                                <td>{{ ++$stt }} </td>
                                <td>{{ $product->name }} </td>
                                <td>{{ $item->size }} </td>
                                <td>{{ $item->qty }} </td>
                                <td>{{ number_format($item->total, 0, '.', '.') }} VND </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">Tổng: {{ number_format($total, 0, '.', '.') }} VND </td>
                        </tr>
                    </tbody>
                </table>
                @if ($order->status == 'order has been cancelled')
                    <button class="btn btn-danger" disabled>Đơn hàng đã hủy</button>
                @elseif($order->status == 'new')
                    <div class="">
                        <form method="POST" action="{{ route('order.cancel.user') }}" class="form-horizontal">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <button class="btn btn-danger cancel" type="button">Hủy đơn hàng</button>
                        </form>
                    </div>
                @elseif($order->status == 'delivered')
                <button class="btn btn-primary" disabled>Đơn hàng của bạn đã được giao</button>
                @else
                    <button class="btn btn-primary" disabled>Đơn hàng của bạn đang được giao</button>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.cancel').on('click', function(ev) {
            ev.preventDefault()
            var self = $(this)
            Swal.fire({
                title: 'Thông báo',
                text: "Bạn có chắc muốn hủy đơn hàng này hay không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit()
                }
            })
        })
    </script>
@endsection

@endsection
