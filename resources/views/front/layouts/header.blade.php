<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{ $site->site_name }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('front.components.meta')

    <!-- Favicon -->
    <link href="{{ getImageUrl($siteSettings['site_icon']) ?? '' }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('front/js/select2/dist/css/select2.css') }}">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/css/rating.css') }}">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a target="_blank" class="text-dark px-2" href="{{ $site->site_link_facebook }}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a target="_blank" class="text-dark px-2" href="{{ $site->site_link_instagram }}">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a target="_blank" class="text-dark pl-2" href="{{ $site->site_link_youtube }}">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">{{ $site->site_name }}</span>
                    </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{ route('shop') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm"
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                {{-- <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a> --}}
                <a href="{{ route('cart') }}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ $cart->total_quantity }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid ">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                {{-- <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a> --}}
                {{-- <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical"  >
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i
                                    class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav> --}}
            </div>
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{route('home')}}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">{{ $site->site_name }}</span>
                        </h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('shop') }}"
                                class="nav-item nav-link {{ request()->is('shop') ? 'active' : '' }}">Shop</a>
                            @php
                                $categories = App\Models\ProductCategory::where('parent_id', 0)->get();
                            @endphp
                            @foreach ($categories as $item)
                                <div class="nav-item dropdown">
                                    <a href="#"
                                        class="nav-link dropdown-toggle {{ request()->is('shop/' . $item->id . '-' . $item->slug . '') ? 'active' : '' }}"
                                        data-toggle="dropdown">{{ $item->name }}</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        @foreach ($item->child as $item)
                                            <a href="{{ route('shop/category', ['id' => $item->id, 'slug' => $item->slug]) }} "
                                                class="dropdown-item">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            {{-- <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Liên hệ</a> --}}
                            @if (Auth::check())
                            @else
                                <a href="{{ route('check.order') }}"
                                    class="nav-item nav-link {{ request()->is('check-order') ? 'active' : '' }}">Đơn
                                    hàng</a>
                            @endif
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if (Auth::check())
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Hi:
                                        {{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ route('user.information') }}" class="dropdown-item">Thông tin cá
                                            nhân</a>
                                        <a href="{{ route('user.change-password') }}" class="dropdown-item">Đổi mật
                                            khẩu</a>
                                        <a href="{{ route('order.user', ['id' => Auth::user()->id]) }}"
                                            class="dropdown-item">Đơn hàng của tôi</a>
                                        <a href="{{ route('logoutUser') }}" class="dropdown-item">Đăng xuất</a>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('loginUser') }}?redirect_uri={{ url()->full() }}"
                                    class="nav-item nav-link"> Đăng nhập</a>
                                <a href="{{ route('registerUser') }}" class="nav-item nav-link">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </nav>
                {{-- slider --}}
                @if (request()->segment(1) == '')
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @if ($slider->count() > 0)
                                @foreach ($slider as $i => $item)
                                    @php
                                        $image = explode(',', $item->images);
                                    @endphp
                                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}" style="height: 410px;">
                                        <img class="img-fluid" src="{{ $image[0] }}" alt="Image">
                                        <div
                                            class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                            <div class="p-3" style="max-width: 700px;">
                                                <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                                    {{ $item->title }}</h4>
                                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                    {{ $item->description }}</h3>
                                                <a href="{{ route('shop') }} " class="btn btn-light py-2 px-3">Shop
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active" style="height: 410px;">
                                    <img class="img-fluid" src="{{ url('front/img/carousel-null.png') }}"
                                        alt="Image">
                                    <div
                                        class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        <div class="p-3" style="max-width: 700px;">
                                            <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                                {{ $site->site_name }}</h4>
                                            <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                                {{ $site->site_description }}</h3>
                                            <a href="{{ route('shop') }} " class="btn btn-light py-2 px-3">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-prev-icon mb-n2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-next-icon mb-n2"></span>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Navbar End -->
