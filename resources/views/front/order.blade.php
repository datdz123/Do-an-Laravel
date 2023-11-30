@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Đơn hàng')
@include('front.components.top-bar')

<div class="container-fluid justify-content-center">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="mb-4">

                <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Thông tin</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th><i class="fa fa-info-circle" aria-hidden="true"></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($order as $i => $item)
                                <tr>
                                    <td class="text-left">
                                        <div class="col-12">Tên KH: {{ $item->name }}</div>
                                        <div class="col-12">Email: {{ $item->email }}</div>
                                        <div class="col-12">SĐT: {{ $item->phone }}</div>
                                        <div class="col-12">Thời gian: {{ $item->created_at->format('d/m/Y') }}</div>

                                    </td>
                                    <td class="align-middle">{{ $item->street_address }}, {{ $item->ward }},
                                        {{ $item->district }},
                                        {{ $item->provincial }}</td>
                                    <td class="align-middle">
                                        @php
                                            $main_total = 0;
                                            foreach ($item->orderDetails as $key => $value) {
                                                $main_total += $value->total;
                                            }
                                        @endphp
                                        {{ number_format($main_total, 0, '.', '.') }} VND
                                    </td>
                                    {{-- <td class="align-middle">
                                        <div class="col-12">
                                            <div class="col-12">
                                                {{ $item->payment_method == 'payment on delivery' ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' }}
                                            </div>
                                            @switch($item->payment_status)
                                                @case('paid')
                                                    -- Đã thanh toán
                                                @break

                                                @case('unpaid')
                                                    -- Chưa thanh toán
                                                @break

                                                @default
                                            @endswitch
                                        </div>
                                    </td> --}}
                                    <td class="align-middle">
                                        @switch($item->status)
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
                                    <td class="align-middle">
                                        <a href="{{route('order.detail.user',['id' => $item->id])}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 pb-1">
                        {{ $order->appends(request()->all())->links('front/layouts/my-pagination') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
