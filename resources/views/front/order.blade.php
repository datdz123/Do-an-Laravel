@extends('front/layouts/masterlayout')
@section('content')
@section('title', __('Đơn hàng'))
@include('front.components.top-bar')

<div class="container-fluid justify-content-center">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="mb-4">

                <div class="col-lg-12 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>{{ __('Thông tin') }}</th>
                                <th>{{ __('Địa chỉ') }}</th>
                                <th>{{ __('Tổng tiền') }}</th>
                                <th>{{ __('Trạng thái') }}</th>
                                <th><i class="fa fa-info-circle" aria-hidden="true"></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($order as $i => $item)

                            <tr>
                                <td class="text-left">
                                    <div class="col-12">{{ __('Tên KH') }}: {{ $item->name }}</div>
                                    <div class="col-12">{{ __('Email') }}: {{ $item->email }}</div>
                                    <div class="col-12">{{ __('SĐT') }}: {{ $item->phone }}</div>
                                    <div class="col-12">{{ __('Thời gian') }}: {{ $item->created_at->format('d/m/Y') }}</div>

                                </td>
                                {{-- @dd($item->orderDetails)--}}
                                <td class="align-middle">{{ $item->street_address }}, {{ $item->ward }},
                                    {{ $item->district }},
                                    {{ $item->provincial }}
                                </td>

                                <td class="align-middle">

                                    {{ number_format($item->total, 0, '.', ',') }} VND
                                </td>
                                <td class="align-middle">
                                    @switch($item->status)
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