@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Kiểm tra đơn hàng')

@include('front/components/top-bar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="search-order-box bg-white p-4 rounded shadow-sm mb-5">
                <h4 class="text-center mb-4">Tra cứu thông tin đơn hàng</h4>
                <form action="{{ route('check.order') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control form-control-lg border-primary" 
                            placeholder="Nhập số điện thoại hoặc email đặt hàng" value="{{ request('q') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa fa-search mr-2"></i>Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (request('q') != '')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead class="thead-light">
                                <tr>
                                    <th class="py-3">Thông tin đơn hàng</th>
                                    <th class="py-3">Địa chỉ giao hàng</th>
                                    <th class="py-3">Tổng tiền</th>
                                    <th class="py-3">Trạng thái</th>
                                    <th class="py-3 text-center">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $i => $item)
                                <tr>
                                    <td>
                                        <div class="order-info p-2">
                                            <p class="mb-1"><strong>{{ $item->name }}</strong></p>
                                            <p class="mb-1 text-muted"><i class="fa fa-envelope mr-2"></i>{{ $item->email }}</p>
                                            <p class="mb-1 text-muted"><i class="fa fa-phone mr-2"></i>{{ $item->phone }}</p>
                                            <p class="mb-0 text-muted"><i class="fa fa-calendar mr-2"></i>{{ $item->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0 text-muted">
                                            <i class="fa fa-map-marker mr-2"></i>
                                            {{ $item->street_address }}, {{ $item->ward }}, {{ $item->district }}, {{ $item->provincial }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        @php
                                            $main_total = 0;
                                            foreach ($item->orderDetails as $key => $value) {
                                                $main_total += $value->total;
                                            }
                                        @endphp
                                        <span class="text-primary font-weight-bold">
                                            {{ number_format($main_total, 0, '.', '.') }} VND
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        @switch($item->status)
                                            @case('new')
                                                <span class="badge badge-info px-3 py-2">Đơn hàng mới</span>
                                            @break
                                            @case('preparing goods')
                                                <span class="badge badge-warning px-3 py-2">Chuẩn bị hàng</span>
                                            @break
                                            @case('delivering')
                                                <span class="badge badge-primary px-3 py-2">Đang giao</span>
                                            @break
                                            @case('delivered')
                                                <span class="badge badge-success px-3 py-2">Đã giao</span>
                                            @break
                                            @case('order has been cancelled')
                                                <span class="badge badge-danger px-3 py-2">Đã hủy</span>
                                            @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{route('order.detail.user',['id' => $item->id])}}" 
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-info-circle mr-2"></i>Xem chi tiết
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $order->appends(request()->all())->links('front/layouts/my-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.search-order-box {
    background: linear-gradient(to right bottom, rgba(255,255,255,0.9), rgba(255,255,255,0.95));
    border: 1px solid rgba(0,0,0,0.1);
}

.search-order-box .form-control {
    border-radius: 4px 0 0 4px;
    height: 50px;
}

.search-order-box .btn {
    border-radius: 0 4px 4px 0;
    height: 50px;
}

.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.order-info p {
    font-size: 0.95rem;
}

.table td {
    vertical-align: middle;
}

.btn-outline-primary:hover {
    color: #fff;
}

.table-hover tbody tr:hover {
    background-color: rgba(209, 156, 151, 0.05);
}
</style>

@endsection
