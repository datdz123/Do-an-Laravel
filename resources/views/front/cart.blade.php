@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Giỏ hàng')
<!-- Page Header Start -->
@include('front.components.top-bar')
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if ($cart->items != [])
                        @foreach ($cart->items as $key => $item)
                            @php
                                $product = \App\Models\Product::find($item['product_id']);

                                $image = explode(',', $product->images);
                            @endphp
                            <tr>
                                <td class="text-left"><img src="{{ $image[0] }}" alt=""
                                        style="width: 50px;">
                                    <a
                                        href="{{ route('detail', ['id' => $item['product_id'], 'slug' => $product->slug]) }} ">{{ $product->name }}
                                    </a> <small class="pt-1"> / {{ $item['size'] }}</small>
                                </td>

                                <td class="align-middle">{{ number_format($item['price'], 0, '.', '.') }} VND</td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.update', ['id' => $key]) }}"
                                        method="GET">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input name="qty" type="text"
                                                class="form-control form-control-sm bg-secondary text-center"
                                                value="{{ $item['qty'] }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </td>
                                <td class="align-middle">
                                    {{ number_format($item['price'] * $item['qty'], 0, '.', '.') }}
                                    VND </td>
                                <td class="align-middle">

                                    {{-- <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button> --}}


                                    <a href="{{ route('cart.remove', ['id' => $key]) }}"
                                        class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="5">Giỏ hàng của bạn đang rỗng! <a href="{{route('shop')}}">shoping ngay</a></td>
                            </tr>
                    @endif


                </tbody>

            </table>
        </div>
        <div class="col-lg-4">

            <a href="{{ route('cart.clear') }}"
            class="btn btn-block btn-primary py-3 mb-3 clear {{ $cart->items == [] ? 'disabled' : '' }} ">Xóa hết giỏ hàng
            </a>


            {{-- <a class="btn btn-block btn-primary my-3 py-3">Cập nhật giỏ hàng</a> --}}
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Tóm tắt giỏ hàng</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng tiền</h6>
                        <h6 class="font-weight-medium">{{ number_format($cart->total_price, 0, '.', '.') }} VND </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Vận chuyển</h6>
                        <h6 class="font-weight-medium"> Miễn Phí vận chuyển</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng cộng</h5>
                        <h5 class="font-weight-bold">{{ number_format($cart->total_price, 0, '.', '.') }} VND</h5>
                    </div>
                    <a href="{{ route('checkout') }}"
                    class="btn btn-block btn-primary my-3 py-3 {{ $cart->items == [] ? 'disabled' : '' }} ">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.clear').on('click', function(ev) {
            ev.preventDefault()
            var self = $(this)
            Swal.fire({
                title: 'Xóa',
                text: "Bạn có chắc muốn xóa hết giỏ hàng không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = self.attr('href')
                }
            })
        })
    </script>
@endsection

@endsection
