@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Đặt hàng thành công')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('title')</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">@yield('title')</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<h4 class="font-weight-semi-bold mb-4 text-center">Cảm ơn quý khách hàng đã tin tưởng shop, đơn hàng của bạn sẽ được sử lý và giao hàng sớm nhất. </h4>
{{-- <h6 class="font-weight-semi-bold mb-4 text-center"><a href=""> Đơn hàng của bạn.</a></h6> --}}



@endsection
