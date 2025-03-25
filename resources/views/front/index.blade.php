@extends('front/layouts/masterlayout')
@section('content')
    @section('title', 'Trang chủ')
    <div class="container mx-0 px-0 w-100 mw-100">
        @if (request()->segment(1) == '')
            <div class="swiper-container" id="header-swiper">
                <div class="swiper-wrapper">
                    @if ($slider->count() > 0)
                        @foreach ($slider as $item)
                            @php
                                $image = explode(',', $item->images);
                            @endphp
                            <div class="swiper-slide" style="height: 70vh;">
                                <img class="img-fluid" src="{{ $image[0] }}" alt="Image"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                                <div
                                    class="swiper-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                            {{ $item->title }}
                                        </h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                            {{ $item->description }}
                                        </h3>
                                        {{-- <a href="{{ route('shop') }}" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide" style="height: 70vh;">
                            <img class="img-fluid" src="{{ url('front/img/carousel-null.png') }}" alt="Image"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="swiper-caption d-flex flex-column align-items-center justify-content-center">
                                @if(isset($site))
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                            <i class="fas fa-shopping-cart text-primary"></i> {{ $site->site_name }}
                                        </h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                            {{ $site->site_description }}
                                        </h3>
                                        <a href="{{ route('shop') }}" class="btn btn-light py-2 px-3">Shop Now</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Nút điều hướng -->
{{--                <div class="swiper-button-prev"></div>--}}
{{--                <div class="swiper-button-next"></div>--}}
{{--                <!-- Phân trang (tùy chọn) -->--}}
{{--                <div class="swiper-pagination"></div>--}}
            </div>
        @endif
    </div>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center mb-4">
                    <img class="w-100" src="{{ asset('/front/img/banner01.webp') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center mb-4">
                    <img class="w-100" src="{{ asset('/front/img/banner02.webp') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center  mb-4">
                    <img class="w-100" src="{{ asset('/front/img/banner03.webp') }}" alt="">
                </div>
            </div>
        </div>
    </div>

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

    @include('front/components/section-products')


@endsection
@section('css')
    <style>
        .swiper-container {
            width: 100%;
            height: 70vh;
            position: relative;
            overflow: hidden;
        }
        .swiper-wrapper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-caption {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
        }

        .swiper-pagination-bullet {
            background: #fff;
            opacity: 0.8;
        }

        .swiper-pagination-bullet-active {
            background: #007bff;
        }
    </style>
@endsection
@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @section('js')
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var swiper = new Swiper('#header-swiper', {
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @foreach($categoriesWithProducts as $categoryWithProducts)
                new Swiper('.product-slider-{{ $categoryWithProducts['category']->slug }}', {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 10,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                    },
                });
                @endforeach
            });
        </script>


    @endsection
@endsection
