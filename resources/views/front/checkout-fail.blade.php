@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Đặt hàng thất bại')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<h4 class="font-weight-semi-bold mb-4 text-center">Thanh toán thất bại. </h4>
<h6 class="font-weight-semi-bold mb-4 text-center"><a href="{{ route('checkout') }} "> Thanh toán lại.</a></h6>



@endsection