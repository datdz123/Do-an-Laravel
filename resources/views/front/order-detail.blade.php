@extends('front/layouts/masterlayout')
@section('content')
@section('title', __('Chi tiết đơn hàng'))
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">{{ __('Home') }}</a></p>
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
                        <h5 class="box-title">{{ __('Thông tin đơn hàng') }}</h5>
                        @switch($order->status)
                        @case('new')
                        <div class=" text-primary">{{ __('Đơn hàng mới') }}</div>
                        @break

                        @case('preparing goods')
                        <div class=" text-primary">{{ __('Shop đang chuẩn bị hàng') }}</div>
                        @break

                        @case('delivering')
                        <div class=" text-info">{{ __('Đang giao hàng') }}</div>
                        @break

                        @case('delivered')
                        <div class=" text-success">{{ __('Đã giao hàng - hoàn thành') }}</div>
                        @break

                        @case('order has been cancelled')
                        <div class=" text-danger">{{ __('Đơn hàng đã hủy') }}</div>
                        @break

                        @default
                        @endswitch
                    </div>
                    @auth
                    <div class="col-lg-6 text-right">
                        <a href="{{ route('order.user', Auth::user()->id) }}" class="btn btn-primary">{{ __('Danh sách đơn hàng') }}</a>
                    </div>

                    @endauth
                </div>

                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Mã đơn hàng:') }}</th>
                            <td>{{ $order->id }} </td>
                        </tr>
                        <tr>
                            <th>{{ __('Tên khách hàng:') }}</th>
                            <td>{{ $order->name }} </td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}: </th>
                            <td>{{ $order->email }} </td>
                        </tr>
                        <tr>
                            <th>{{ __('Số điện thoại:') }}</th>
                            <td>{{ $order->phone }} </td>
                        </tr>
                        <tr>
                            <th>{{ __('Địa chỉ:') }}</th>
                            <td>{{ $order->street_address }}, {{ $order->ward }}, {{ $order->district }},
                                {{ $order->provincial }}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Ghi chú:') }}</th>
                            <td>{{ $order->note }} </td>
                        </tr>
                        <tr>
                            <th>{{ __('Phương thức thanh toán:') }}</th>
                            <td>
                                {{ $order->payment_method == 'payment on delivery' ? __('Thanh toán khi nhận hàng') : __('Thanh toán trực tuyến') }}

                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Tình trạng thanh toán:') }}</th>
                            <td>
                                {{ $order->payment_status == 'paid' ? __('Đã thanh toán') : __('Chưa thanh toán') }}

                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Trạng thái đơn hàng:') }}</th>
                            <td>

                                @switch($order->status)
                                @case('new')
                                <div>{{ __('Đơn hàng mới') }}</div>
                                @break

                                @case('preparing goods')
                                <div>{{ __('Chuẩn bị hàng') }}</div>
                                @break

                                @case('delivering')
                                <div>{{ __('Đang giao') }}</div>
                                @break

                                @case('delivered')
                                <div>{{ __('Đã giao') }}</div>
                                @break

                                @case('order has been cancelled')
                                <div>{{ __('Đã bị hủy') }}</div>
                                @break

                                @default
                                @endswitch

                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Thời gian:') }}</th>
                            <td>{{ $order->created_at->format('H:i:s - d/m/Y') }} </td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <h5 class="box-title">{{ __('Danh sách sản phẩm') }}</h5>
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Tên sản phẩm') }}</th>
                            <th>{{ __('Kích cỡ') }}</th>
                            <th>{{ __('Số lượng') }}</th>
                            <th>{{ __('Giá') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($order_detail as $stt => $item)
                        {{-- @dd($item);--}}

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
                            <td colspan="6">{{ __('Tổng') }}: {{ number_format($total, 0, '.', '.') }} VND </td>
                        </tr>
                    </tbody>
                </table>
                @if ($order->status == 'order has been cancelled')
                <button class="btn btn-danger" disabled>{{ __('Đơn hàng đã hủy') }}</button>
                @elseif($order->status == 'new')
                <div class="">
                    <form method="POST" action="{{ route('order.cancel.user') }}" class="form-horizontal">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <button class="btn btn-danger cancel" type="button">{{ __('Hủy đơn hàng') }}</button>
                    </form>
                </div>
                @elseif($order->status == 'delivered')
                <button class="btn btn-primary" disabled>{{ __('Đơn hàng của bạn đã được giao') }}</button>
                @else
                <button class="btn btn-primary" disabled>{{ __('Đơn hàng của bạn đang được giao') }}</button>
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
            title: '{{ __("Thông báo") }}',
            text: '{{ __("Bạn có chắc muốn hủy đơn hàng này hay không?") }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '{{ __("Đồng ý") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit()
            }
        })
    })
</script>
@endsection

@endsection