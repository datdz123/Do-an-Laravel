@extends('front/layouts/masterlayout')
@section('content')
@section('title', __('Giỏ hàng'))

@include('front.components.top-bar')

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover shopping-cart-table">
                            <thead>
                                <tr>
                                    <th class="py-3">{{ __('Sản phẩm') }}</th>
                                    <th class="py-3">{{ __('Giá') }}</th>
                                    <th class="py-3" width="150">{{ __('Số lượng') }}</th>
                                    <th class="py-3">{{ __('Tổng') }}</th>
                                    <th class="py-3 text-center" width="100">{{ __('Xóa') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cart->items != [])
                                @foreach ($cart->items as $key => $item)
                                @php
                                $product = \App\Models\Product::find($item['product_id']);
                                $image = explode(',', $product->images);
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $image[0] }}" alt="{{ $product->name }}"
                                                class="img-fluid rounded" style="width: 80px;">
                                            <div class="ml-3">
                                                <a href="{{ route('detail', ['id' => $item['product_id'], 'slug' => $product->slug]) }}"
                                                    class="product-name">{{ $product->name }}</a>
                                                <div class="text-muted small mt-1">Size: {{ $item['size'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-primary font-weight-bold">
                                            {{ number_format($item['price'], 0, '.', '.') }} VND
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <form action="{{ route('cart.update', ['id' => $key]) }}" method="GET">
                                            <div class="quantity-control">
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input name="qty" type="text" class="form-control form-control-sm text-center qty-input"
                                                    value="{{ $item['qty'] }}">
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-primary font-weight-bold">
                                            {{ number_format($item['price'] * $item['qty'], 0, '.', '.') }} VND
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('cart.remove', ['id' => $key]) }}"
                                            class="btn btn-outline-danger btn-sm remove-item">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="empty-cart">
                                            <i class="fa fa-shopping-cart fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">{{ __('Giỏ hàng của bạn đang trống') }}</h5>
                                            <a href="{{route('shop')}}" class="btn btn-primary mt-3">
                                                <i class="fa fa-shopping-bag mr-2"></i>{{ __('Mua sắm ngay') }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="position-sticky" style="top: 2rem;">
                @if ($cart->items != [])
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger btn-block clear">
                            <i class="fa fa-trash mr-2"></i>{{ __('Xóa giỏ hàng') }}
                        </a>
                    </div>
                </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-white border-bottom-0">
                        <h5 class="card-title mb-0">{{ __('Tóm tắt đơn hàng') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>{{ __('Tạm tính') }}</span>
                            <span class="text-dark font-weight-bold">{{ number_format($cart->total_price, 0, '.', '.') }} VND</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>{{ __('Phí vận chuyển') }}</span>
                            <span class="text-success">{{ __('Miễn phí') }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="font-weight-bold">{{ __('Tổng cộng') }}</span>
                            <span class="text-primary font-weight-bold h5 mb-0">
                                {{ number_format($cart->total_price, 0, '.', '.') }} VND
                            </span>
                        </div>
                        <a href="{{ route('checkout') }}"
                            class="btn btn-primary btn-block {{ $cart->items == [] ? 'disabled' : '' }}">
                            <i class="fa fa-credit-card mr-2"></i>{{ __('Thanh toán') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .shopping-cart-table th {
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        color: #6c757d;
        background-color: #f8f9fa;
    }

    .product-name {
        color: #2b2f4c;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
    }

    .product-name:hover {
        color: #D19C97;
        text-decoration: none;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .quantity-control .form-control {
        width: 50px;
        text-align: center;
        padding: 0.25rem;
        border-color: #dee2e6;
    }

    .quantity-control .btn {
        padding: 0.25rem 0.5rem;
    }

    .empty-cart {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 0;
    }

    .remove-item {
        transition: all 0.2s;
    }

    .remove-item:hover {
        background-color: #dc3545;
        color: white;
    }

    .card {
        border: none;
        border-radius: 0.5rem;
    }

    .card-header {
        background-color: transparent;
        padding: 1.5rem;
    }

    .btn-outline-danger {
        transition: all 0.2s;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
</style>

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.clear').on('click', function(ev) {
        ev.preventDefault();
        var self = $(this);
        Swal.fire({
            title: '{{ __("Xóa giỏ hàng?") }}',
            text: '{{ __("Bạn có chắc muốn xóa tất cả sản phẩm khỏi giỏ hàng?") }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '{{ __("Xóa giỏ hàng") }}',
            cancelButtonText: '{{ __("Hủy") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = self.attr('href');
            }
        });
    });

    // Quantity controls
    $('.btn-minus').click(function() {
        var input = $(this).closest('.quantity-control').find('input');
        var value = parseInt(input.val());
        if (value > 1) {
            input.val(value - 1).trigger('change');
        }
    });

    $('.btn-plus').click(function() {
        var input = $(this).closest('.quantity-control').find('input');
        var value = parseInt(input.val());
        input.val(value + 1).trigger('change');
    });

    $('.qty-input').change(function() {
        $(this).closest('form').submit();
    });
</script>
@endsection

@endsection