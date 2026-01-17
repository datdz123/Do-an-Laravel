<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>@yield('title') | {{$siteSettings['site_name'] ?? config('app.name')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('front.components.meta')
    <link href="{{ getImageUrl($siteSettings['site_icon']) ?? '' }}" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/js/select2/dist/css/select2.css') }}">
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/rating.css') }}">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


<body>
    <!-- Topbar Start -->
    {{-- <div class="container-fluid">--}}

    {{-- <div class="row align-items-center py-3 px-xl-5">--}}
    {{-- <div class="col-lg-3 d-none d-lg-block">--}}

    {{-- </div>--}}
    {{-- <div class="col-lg-6 col-6 text-left">--}}
    {{-- <form action="{{ route('shop') }}" method="GET">--}}
    {{-- <div class="input-group">--}}
    {{-- <input type="text" id="search" name="search_header" class="form-control" placeholder="Tìm kiếm sản phẩm" value="{{ request('search') }}">--}}
    {{-- <div class="input-group-append">--}}
    {{-- <button type="submit" class="input-group-text bg-transparent text-primary">--}}
    {{-- <i class="fa fa-search"></i>--}}
    {{-- </button>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- <div id="productList"></div>--}}
    {{-- </form>--}}
    {{-- </div>--}}
    {{-- <div class="col-lg-3 col-6 text-right d-flex justify-content-center">--}}
    {{-- --}}{{-- <a href="" class="btn border">--}}
    {{-- <i class="fas fa-heart text-primary"></i>--}}
    {{-- <span class="badge">0</span>--}}
    {{-- </a> --}}

    {{-- <div class="form-group d-flex mr-3">--}}
    {{-- @if(App::getLocale() === 'vi')--}}

    {{-- <div class="nav-item language">--}}
    {{-- <a class="nav-link d-flex active" href="{{ route('home', ['locale' => 'vi']) }}"> <img class="custom-svg" src="{{asset('svgIcon/viActive.svg')}}" alt="VI">--}}
    {{-- </a>--}}
    {{-- </div>--}}
    {{-- <div class="nav-item language ">--}}
    {{-- <a class="nav-link d-flex " href="{{ route('home', ['locale' => 'en']) }}">--}}
    {{-- <img class="custom-svg" src="{{ asset('svgIcon/en.svg') }}" alt="Eng">--}}
    {{-- </a>--}}
    {{-- </div>--}}
    {{-- @else--}}
    {{-- <div class="nav-item language">--}}
    {{-- <a class="nav-link d-flex " href="{{ route('home', ['locale' => 'vi']) }}">--}}
    {{-- <img class="custom-svg" src="{{asset('svgIcon/vi.svg')}}" alt="VI">--}}
    {{-- </a>--}}
    {{-- </div>--}}
    {{-- <div class="nav-item language ">--}}
    {{-- <a class="nav-link d-flex " href="{{ route('home', ['locale' => 'en']) }}">--}}
    {{-- <img class="custom-svg" src="{{ asset('svgIcon/enActive.svg') }}" alt="Eng">--}}
    {{-- </a>--}}
    {{-- </div>--}}
    {{-- @endif--}}
    {{-- </div>--}}

    {{-- </div>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="w-100 max-w-100 sticky-custom sticky-top bg-light ">
        <div class="container-fluid  ">
            <div class="row border-top ">
                <div class="col-lg-12 px-0 ">
                    <nav class="navbar navbar-expand-lg  navbar-light py-3 py-lg-0 px-xl-5 ">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="text-decoration-none">
                                <h1 class="m-0 display-5 font-weight-semi-bold">
                                    <img src="{{asset("/front/img/Logo.png")}}" alt="Logo" class="custom-logo">
                                </h1>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mx-auto py-0">
                                <a href="{{ route('shop') }}"
                                    class="nav-item nav-link {{ request()->is('shop') ? 'active' : '' }}">{{__('Shop')}}</a>

                                @php
                                $categories = App\Models\ProductCategory::where('parent_id', 0)->get();
                                @endphp
                                @foreach ($categories as $item)
                                <div class="nav-item dropdown">
                                    <a href="#"
                                        class="nav-link dropdown-toggle {{ request()->is('shop/' . $item->id . '-' . $item->slug . '') ? 'active' : '' }}"
                                        data-toggle="dropdown">{{ __($item->name) }}</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        @foreach ($item->children as $child)
                                        <a href="{{ route('shop/category', ['id' => $child->id, 'slug' => $child->slug]) }} "
                                            class="dropdown-item">{{ __($child->name) }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                <a href="{{ route('blog') }}"
                                    class="nav-item nav-link {{ request()->is('blog') ? 'active' : '' }}">{{ __('Blog') }}</a>

                                @if (Auth::check())
                                @else
                                <a href="{{ route('check.order') }}"
                                    class="nav-item nav-link w-100  {{ request()->is('check-order') ? 'active' : '' }}">{{ __('Đơn hàng') }}</a>
                                @endif
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <div class="nav-item dropdown mr-2">
                                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
                                        @if(App::getLocale() == 'vi')
                                        <img class="custom-svg" src="{{ asset('svgIcon/viActive.svg') }}" alt="VN" style="width: 25px;">
                                        @else
                                        <img class="custom-svg" src="{{ asset('svgIcon/enActive.svg') }}" alt="EN" style="width: 25px;">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu rounded-0 m-0" style="min-width: 100px;">
                                        <a href="{{ route('change-language', ['locale' => 'vi']) }}" class="dropdown-item d-flex align-items-center {{ App::getLocale() == 'vi' ? 'active' : '' }}">
                                            <img src="{{ asset(App::getLocale() == 'vi' ? 'svgIcon/viActive.svg' : 'svgIcon/vi.svg') }}" alt="VN" style="width: 20px; margin-right: 8px;"> VN
                                        </a>
                                        <a href="{{ route('change-language', ['locale' => 'en']) }}" class="dropdown-item d-flex align-items-center {{ App::getLocale() == 'en' ? 'active' : '' }}">
                                            <img src="{{ asset(App::getLocale() == 'en' ? 'svgIcon/enActive.svg' : 'svgIcon/en.svg') }}" alt="EN" style="width: 20px; margin-right: 8px;"> EN
                                        </a>
                                    </div>
                                </div>
                                <div class="d-inline-flex align-items-center justify-content-center">
                                    <div>
                                        <input type="checkbox" class="checkbox" id="checkbox">
                                        <label for="checkbox" class="checkbox-label">
                                            <i class="fas fa-moon"></i>
                                            <i class="fas fa-sun"></i>
                                            <span class="ball"></span>
                                        </label>
                                    </div>
                                </div>
                                @if (Auth::check())
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Hi:
                                        {{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ route('user.information') }}" class="dropdown-item">{{ __('Thông tin cá nhân') }}</a>
                                        <a href="{{ route('user.change-password') }}" class="dropdown-item">{{ __('Đổi mật khẩu') }}</a>
                                        <a href="{{ route('order.user', ['id' => Auth::user()->id]) }}"
                                            class="dropdown-item">{{ __('Đơn hàng của tôi') }}</a>
                                        <a href="{{ route('logoutUser') }}" class="dropdown-item">{{ __('Đăng xuất') }}</a>
                                    </div>
                                </div>
                                @else
                                <div class="li_log">
                                    <a href="{{ route('loginUser') }}?redirect_uri={{ url()->full() }}">
                                        <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="17.5" cy="18" r="17.5" fill="#EEEEEE"></circle>
                                            <g clip-path="url(#clip0_98_1044)">
                                                <rect width="22" height="22" transform="translate(7 6.5)" fill="white" fill-opacity="0.01"></rect>
                                                <path d="M26.5071 23.6747C26.0439 22.5776 25.3718 21.581 24.5281 20.7405C23.687 19.8976 22.6906 19.2256 21.5939 18.7615C21.5841 18.7566 21.5743 18.7542 21.5645 18.7492C23.0942 17.6443 24.0886 15.8446 24.0886 13.814C24.0886 10.4501 21.3631 7.72469 17.9993 7.72469C14.6355 7.72469 11.91 10.4501 11.91 13.814C11.91 15.8446 12.9044 17.6443 14.4341 18.7517C14.4243 18.7566 14.4145 18.7591 14.4047 18.764C13.3047 19.228 12.3176 19.8934 11.4705 20.743C10.6276 21.5841 9.95555 22.5805 9.49148 23.6772C9.03558 24.7508 8.7897 25.9018 8.76715 27.068C8.7665 27.0942 8.77109 27.1203 8.78067 27.1447C8.79025 27.1691 8.80461 27.1913 8.82292 27.2101C8.84122 27.2288 8.8631 27.2438 8.88726 27.2539C8.91142 27.2641 8.93737 27.2693 8.96358 27.2693H10.4368C10.5448 27.2693 10.6308 27.1834 10.6332 27.0778C10.6823 25.1823 11.4435 23.4071 12.789 22.0615C14.1812 20.6693 16.0301 19.9033 17.9993 19.9033C19.9685 19.9033 21.8174 20.6693 23.2096 22.0615C24.5551 23.4071 25.3163 25.1823 25.3654 27.0778C25.3678 27.1859 25.4538 27.2693 25.5618 27.2693H27.035C27.0612 27.2693 27.0872 27.2641 27.1113 27.2539C27.1355 27.2438 27.1574 27.2288 27.1757 27.2101C27.194 27.1913 27.2083 27.1691 27.2179 27.1447C27.2275 27.1203 27.2321 27.0942 27.2314 27.068C27.2069 25.8943 26.9638 24.7526 26.5071 23.6747ZM17.9993 18.0372C16.8723 18.0372 15.8116 17.5977 15.0136 16.7997C14.2156 16.0017 13.7761 14.941 13.7761 13.814C13.7761 12.687 14.2156 11.6263 15.0136 10.8283C15.8116 10.0303 16.8723 9.59076 17.9993 9.59076C19.1263 9.59076 20.187 10.0303 20.985 10.8283C21.783 11.6263 22.2225 12.687 22.2225 13.814C22.2225 14.941 21.783 16.0017 20.985 16.7997C20.187 17.5977 19.1263 18.0372 17.9993 18.0372Z" fill="#010506"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_98_1044">
                                                    <rect width="22" height="22" fill="white" transform="translate(7 6.5)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                @endif
                                <a id="search-icon" href="javascript:void(0)" class="search">
                                    <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="17.5" cy="18" r="17.5" fill="#EEEEEE"></circle>
                                        <g clip-path="url(#clip0_281_10108)">
                                            <rect width="22" height="22" transform="translate(7 7)" fill="white" fill-opacity="0.01"></rect>
                                            <path d="M27.7626 26.4126L21.3861 20.036C22.3756 18.7568 22.9109 17.1927 22.9109 15.5476C22.9109 13.5784 22.1423 11.732 20.7526 10.3398C19.3629 8.94764 17.5115 8.18156 15.5448 8.18156C13.578 8.18156 11.7267 8.95009 10.337 10.3398C8.94478 11.7296 8.17871 13.5784 8.17871 15.5476C8.17871 17.5144 8.94724 19.3657 10.337 20.7554C11.7267 22.1476 13.5756 22.9137 15.5448 22.9137C17.1899 22.9137 18.7515 22.3784 20.0307 21.3914L26.4073 27.7655C26.426 27.7842 26.4482 27.799 26.4726 27.8092C26.4971 27.8193 26.5232 27.8245 26.5497 27.8245C26.5761 27.8245 26.6023 27.8193 26.6268 27.8092C26.6512 27.799 26.6734 27.7842 26.6921 27.7655L27.7626 26.6974C27.7813 26.6787 27.7962 26.6565 27.8063 26.6321C27.8164 26.6076 27.8217 26.5815 27.8217 26.555C27.8217 26.5286 27.8164 26.5024 27.8063 26.4779C27.7962 26.4535 27.7813 26.4313 27.7626 26.4126ZM19.4341 19.4369C18.393 20.4755 17.0131 21.0476 15.5448 21.0476C14.0765 21.0476 12.6966 20.4755 11.6555 19.4369C10.6169 18.3959 10.0448 17.0159 10.0448 15.5476C10.0448 14.0793 10.6169 12.697 11.6555 11.6584C12.6966 10.6197 14.0765 10.0476 15.5448 10.0476C17.0131 10.0476 18.3955 10.6173 19.4341 11.6584C20.4727 12.6994 21.0448 14.0793 21.0448 15.5476C21.0448 17.0159 20.4727 18.3983 19.4341 19.4369Z" fill="#010506"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_281_10108">
                                                <rect width="22" height="22" fill="white" transform="translate(7 7)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>

                                <a href="{{ route('cart') }}">
                                    <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="17.5" cy="18" r="17.5" fill="#EEEEEE"></circle>
                                        <g clip-path="url(#clip0_99_1743)">
                                            <rect width="22" height="22" transform="translate(7 7)" fill="white" fill-opacity="0.01"></rect>
                                            <path d="M12.0417 27.1667C11.6751 27.1667 11.3542 27.0292 11.0792 26.7542C10.8042 26.4792 10.6667 26.1583 10.6667 25.7917V13.875C10.6667 13.5083 10.8042 13.1875 11.0792 12.9125C11.3542 12.6375 11.6751 12.5 12.0417 12.5H14.5626V12.2708C14.5626 11.3083 14.8949 10.4948 15.5595 9.83021C16.224 9.16563 17.0376 8.83334 18.0001 8.83334C18.9626 8.83334 19.7761 9.16563 20.4407 9.83021C21.1053 10.4948 21.4376 11.3083 21.4376 12.2708V12.5H23.9584C24.3251 12.5 24.6459 12.6375 24.9209 12.9125C25.1959 13.1875 25.3334 13.5083 25.3334 13.875V25.7917C25.3334 26.1583 25.1959 26.4792 24.9209 26.7542C24.6459 27.0292 24.3251 27.1667 23.9584 27.1667H12.0417ZM12.0417 25.7917H23.9584V13.875H21.4376V15.9375C21.4376 16.1323 21.3713 16.2956 21.2388 16.4273C21.1062 16.5591 20.942 16.625 20.7461 16.625C20.5501 16.625 20.3872 16.5591 20.2574 16.4273C20.1275 16.2956 20.0626 16.1323 20.0626 15.9375V13.875H15.9376V15.9375C15.9376 16.1323 15.8713 16.2956 15.7388 16.4273C15.6062 16.5591 15.442 16.625 15.2461 16.625C15.0501 16.625 14.8872 16.5591 14.7574 16.4273C14.6275 16.2956 14.5626 16.1323 14.5626 15.9375V13.875H12.0417V25.7917ZM15.9376 12.5H20.0626V12.2708C20.0626 11.6903 19.864 11.2014 19.4667 10.8042C19.0695 10.4069 18.5806 10.2083 18.0001 10.2083C17.4195 10.2083 16.9306 10.4069 16.5334 10.8042C16.1362 11.2014 15.9376 11.6903 15.9376 12.2708V12.5Z" fill="#010506"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_99_1743">
                                                <rect width="22" height="22" fill="white" transform="translate(7 7)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <p class="p-cart count-products">
                                        {{ session('cart') ? count(session('cart')) : 0 }}
                                    </p>
                                </a>

                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Search -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('shop') }}" method="GET" id="searchForm">
                        <div class="input-group">
                            <input type="text" id="searchInput" name="search" class="form-control form-control-lg"
                                placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="searchResults" class="mt-3">
                        <div class="list-group"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mở modal khi click vào icon search
            $('#search-icon').click(function() {
                $('#searchModal').modal('show');
            });

            // Xử lý search realtime
            let searchTimeout;
            $('#searchInput').on('keyup', function() {
                clearTimeout(searchTimeout);
                const query = $(this).val();

                // Đợi người dùng ngừng gõ 300ms mới search
                searchTimeout = setTimeout(function() {
                    if (query.length > 0) {
                        $.ajax({
                            url: "{{ route('shop.search') }}",
                            type: "GET",
                            data: {
                                'search': query
                            },
                            success: function(data) {
                                $('#searchResults .list-group').html(data);
                                $('#searchResults').show();
                            }
                        });
                    } else {
                        $('#searchResults').hide();
                    }
                }, 300);
            });

            // Đóng kết quả search khi click ngoài
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#searchResults, #searchInput').length) {
                    $('#searchResults').hide();
                }
            });
        });

        const checkbox = document.getElementById("checkbox");
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme == 'dark') {
            document.body.classList.add('dark');
            checkbox.checked = true;
        }
        checkbox.addEventListener("change", () => {
            document.body.classList.toggle("dark");

            let theme = 'light';
            if (document.body.classList.contains('dark')) {
                theme = 'dark';
            }
            localStorage.setItem('theme', theme);
        });
    </script>