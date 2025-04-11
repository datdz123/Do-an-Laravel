<div class="page-header position-relative">
    <div class="page-header-overlay" style="
        background: linear-gradient(135deg, #D19C97 0%, #6C757D 100%);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.9;
    "></div>
    
    <div class="container py-5">
        <div class="header-content position-relative text-center py-5">
            <h1 class="display-4 text-white font-weight-bold text-uppercase mb-4 animated fadeInDown">
                @yield('title')
            </h1>
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}" class="text-white">
                            <i class="fa fa-home mr-1"></i>Trang chủ
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        @yield('title')
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<style>
.page-header {
    background-image: url('/front/img/pattern.png');
    background-repeat: repeat;
    background-position: center;
    min-height: 300px;
    display: flex;
    align-items: center;
    margin-bottom: 3rem;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: #ffffff;
    content: "›";
    font-size: 1.2rem;
    line-height: 1;
    padding: 0 0.8rem;
}

.breadcrumb-item a {
    transition: all 0.3s;
}

.breadcrumb-item a:hover {
    color: #D19C97 !important;
    text-decoration: none;
}

.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translate3d(0, -20px, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

.fadeInDown {
    animation-name: fadeInDown;
}
</style>
