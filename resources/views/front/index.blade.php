@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Trang chủ')


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Trả hàng trong 14 ngày</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
{{-- <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ url('front/img/cat-1.jpg')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ url('front/img/cat-2.jpg')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ url('front/img/cat-3.jpg')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ url('front/img/cat-4.jpg')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Accerssories</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ url('front/img/cat-5.jpg')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Bags</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ url('front/img/cat-6.jpg')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Shoes</h5>
            </div>
        </div>
    </div>
</div> --}}
<!-- Categories End -->

<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        @if ($banner->count() > 0)
            @foreach ($banner as $key => $item)
                @php
                    $images = explode(',', $item->images);

                    $key = $key % 2;
                @endphp
                <div class="col-md-{{ $item->size }} pb-4">
                    <div class="position-relative bg-secondary text-center text-md-{{$key == 0 ? 'right' : 'left'}} text-white mb-2 py-5 px-5">
                        <img src="{{ $images[0] }}" alt="">
                        <div class="position-relative" style="z-index: 1;">
                            <h5 class="text-uppercase text-primary mb-3">{{ $item->title }}</h5>
                            <h4 class="mb-4 font-weight-semi-bold">{{ $item->content }}</h4>
                            <a target="_blank" href="{{ $item->link }}" class="btn btn-outline-primary py-md-2 px-md-3">Click here</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới về</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($products as $item)
            @php
                $image = explode(',', $item->images);
            @endphp
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100 h-100" src="{{ $image[0] }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $item->name }} </h6>
                        <div class="d-flex justify-content-center">
                            @if ($item->discount)
                                <h6>{{ number_format($item->discount, 0, '.', '.') }} VND</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($item->price, 0, '.', '.') }}
                                        VND</del></h6>
                            @else
                                <h6>{{ number_format($item->price, 0, '.', '.') }} VND</h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }}"
                            class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                            tiết</a>
                        {{-- <a href="" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Products End -->

<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-1.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-2.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-3.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-4.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-5.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-6.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-7.jpg') }}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{ url('front/img/vendor-8.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->

@endsection
