@extends('front/layouts/masterlayout')
@section('content')
@section('title', __('Trang chủ'))
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
        {{-- <div class="swiper-button-prev"></div>--}}
        {{-- <div class="swiper-button-next"></div>--}}
        {{-- <!-- Phân trang (tùy chọn) -->--}}
        {{-- <div class="swiper-pagination"></div>--}}
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
                <h5 class="font-weight-semi-bold m-0">{{ __('Sản phẩm chất lượng') }}</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">{{ __('Miễn phí vận chuyển') }}</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">{{ __('Trả hàng trong 14 ngày') }}</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">{{ __('Hỗ trợ 24/7') }}</h5>
            </div>
        </div>
    </div>
</div>

@include('front/components/section-products')

<!-- Blog Section Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">{{ __('Tin tức & Blog') }}</span>
        </h2>
        <p class="text-muted">{{ __('Cập nhật những xu hướng thời trang mới nhất và bí quyết phối đồ') }}</p>
    </div>
    <div class="row">
        <!-- Blog Post 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        class="img-fluid" alt="{{ __('Xu hướng thời trang 2023') }}">
                    <div class="blog-date">
                        <span class="day">15</span>
                        <span class="month">{{ __('Tháng 6') }}</span>
                    </div>
                </div>
                <div class="blog-content p-4">
                    <div class="blog-category">
                        <a href="#" class="text-primary">{{ __('Thời trang') }}</a>
                    </div>
                    <h5 class="blog-title">
                        <a href="{{ route('blog.detail', ['id' => 1]) }}">{{ __('Xu hướng thời trang 2023: Phong cách tối giản và bền vững') }}</a>
                    </h5>
                    <p class="blog-excerpt">
                        {{ __('Khám phá những xu hướng thời trang nổi bật năm 2023, tập trung vào phong cách tối giản và thời trang bền vững.') }}
                    </p>
                    <a href="{{ route('blog.detail', ['id' => 1]) }}" class="btn btn-outline-primary btn-sm">{{ __('Đọc thêm') }}</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1567401893414-76b7b1e5a7a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        class="img-fluid" alt="{{ __('Bí quyết phối đồ') }}">
                    <div class="blog-date">
                        <span class="day">22</span>
                        <span class="month">{{ __('Tháng 6') }}</span>
                    </div>
                </div>
                <div class="blog-content p-4">
                    <div class="blog-category">
                        <a href="#" class="text-primary">{{ __('Phong cách') }}</a>
                    </div>
                    <h5 class="blog-title">
                        <a href="{{ route('blog.detail', ['id' => 2]) }}">{{ __('Bí quyết phối đồ: Từ cơ bản đến nâng cao') }}</a>
                    </h5>
                    <p class="blog-excerpt">
                        {{ __('Hướng dẫn chi tiết về cách phối đồ từ những món đồ cơ bản trong tủ quần áo. Từ cách kết hợp màu sắc đến việc chọn phụ kiện phù hợp.') }}
                    </p>
                    <a href="{{ route('blog.detail', ['id' => 2]) }}" class="btn btn-outline-primary btn-sm">{{ __('Đọc thêm') }}</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="blog-card h-100">
                <div class="blog-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                        class="img-fluid" alt="{{ __('Chăm sóc quần áo') }}">
                    <div class="blog-date">
                        <span class="day">30</span>
                        <span class="month">{{ __('Tháng 6') }}</span>
                    </div>
                </div>
                <div class="blog-content p-4">
                    <div class="blog-category">
                        <a href="#" class="text-primary">{{ __('Chăm sóc') }}</a>
                    </div>
                    <h5 class="blog-title">
                        <a href="{{ route('blog.detail', ['id' => 3]) }}">{{ __('Hướng dẫn chăm sóc và bảo quản quần áo đúng cách') }}</a>
                    </h5>
                    <p class="blog-excerpt">
                        {{ __('Bí quyết giữ quần áo luôn mới và bền đẹp. Từ cách giặt, phơi đến việc bảo quản theo mùa.') }}
                    </p>
                    <a href="{{ route('blog.detail', ['id' => 3]) }}" class="btn btn-outline-primary btn-sm">{{ __('Đọc thêm') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End -->

<style>
    .blog-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .blog-image-wrapper {
        position: relative;
        overflow: hidden;
        height: 250px;
    }

    .blog-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-image-wrapper img {
        transform: scale(1.05);
    }

    .blog-date {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(209, 156, 151, 0.9);
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        min-width: 60px;
    }

    .blog-date .day {
        display: block;
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1;
    }

    .blog-date .month {
        display: block;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .blog-category {
        margin-bottom: 10px;
    }

    .blog-category a {
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-category a:hover {
        color: #D19C97 !important;
    }

    .blog-title {
        margin-bottom: 15px;
    }

    .blog-title a {
        color: #2b2f4c;
        text-decoration: none;
        transition: color 0.3s ease;
        font-size: 1.2rem;
        line-height: 1.4;
    }

    .blog-title a:hover {
        color: #D19C97;
    }

    .blog-excerpt {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .section-title {
        position: relative;
        display: inline-block;
    }

    .section-title::before {
        position: absolute;
        content: "";
        width: 100%;
        height: 1px;
        top: 50%;
        left: 0;
        background: #dee2e6;
        z-index: -1;
    }
</style>

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
    document.addEventListener('DOMContentLoaded', function() {
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