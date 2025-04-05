

<div class="page-header bg-secondary mb-5">
    <div class="header-content d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="breadcrumb d-inline-flex">
            <p class="m-0"><a href="{{route('home')}}">Trang chủ</a></p>
            <p class="separator m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>
