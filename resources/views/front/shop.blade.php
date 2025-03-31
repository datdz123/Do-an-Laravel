@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Shop')


@include('front.components.top-bar')


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Color Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Danh mục sản phẩm</h5>

                <form method="GET" action="{{ route('shop') }}">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" {{ request('id') == '' ? 'checked' : '' }} type="checkbox"
                            class="custom-control-input" id="size-all">
                        <label class="custom-control-label" for="size-all">Tất cả</label>
                        <span
                            class="badge border font-weight-normal">{{ App\Models\Product::where('status', 'active')->count() }}</span>

                    </div>
                </form>

                   {{$showCategories::showCategories($categories)}}


                {{-- </form> --}}
            </div>
            <!-- Color End -->
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Lọc theo giá</h5>
                <form method="GET">

                    <div class="d-flex flex-column justify-content-start ">
                        <a class="{{ request('price') == '0->' ? 'text-primary' : 'text-dark' }} mb-2 "
                            href="?price=0->">
                            Tất
                            cả giá </a>
                        <a class="{{ request('price') == '0->100000' ? 'text-primary' : 'text-dark' }} mb-2 "
                            href="?price=0->100000">
                            Từ 0
                            Đến 100.000 VND</a>
                        <a class="{{ (request('price') == '100000->300000' ?? '') == 'on' ? 'text-primary' : 'text-dark' }} mb-2"
                            href="?price=100000->300000">
                            Từ 100.000
                            Đến 300.000 VND</a>
                        <a class="{{ (request('price') == '300000->500000' ?? '') == 'on' ? 'text-primary' : 'text-dark' }} mb-2"
                            href="?price=300000->500000">
                            Từ 300.000
                            Đến 500.000 VND</a>
                        <a class="{{ (request('price') == '500000->1000000' ?? '') == 'on' ? 'text-primary' : 'text-dark' }} mb-2"
                            href="?price=500000->1000000">
                            Từ 500.000
                            Đến 1.000.000 VND</a>
                        <a class="{{ (request('price') == '1000000->' ?? '') == 'on' ? 'text-primary' : 'text-dark' }} mb-2"
                            href="?price=1000000->">
                            Trên
                            1.000.000 VND</a>
                    </div>



                </form>
            </div>

        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Tìm theo tên"
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @switch(request('sort_by'))
                                    @case('new-product')
                                        {{ 'Sản phẩm mới' }}
                                    @break

                                    @case('old-product')
                                        {{ 'Sản phẩm cũ' }}
                                    @break

                                    @case('name-ascending')
                                        {{ 'Tên A - Z' }}
                                    @break

                                    @case('name-descending')
                                        {{ 'Tên Z - A' }}
                                    @break

                                    @case('price-ascending')
                                        {{ 'Giá tăng dần' }}
                                    @break

                                    @case('price-descending')
                                        {{ 'Giá giảm dần' }}
                                    @break

                                    @default
                                        {{ 'Sản phẩm mới' }}
                                @endswitch
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="?sort_by=new-product">Sản phẩm mới</a>
                                <a class="dropdown-item" href="?sort_by=old-product">Sản phẩm cũ</a>
                                <a class="dropdown-item" href="?sort_by=name-ascending">Tên A - Z</a>
                                <a class="dropdown-item" href="?sort_by=name-descending">Tên Z - A</a>
                                <a class="dropdown-item" href="?sort_by=price-ascending">Giá tăng dần</a>
                                <a class="dropdown-item" href="?sort_by=price-descending">Giá giảm dần</a>
                            </div>

                        </div>
                    </div>
                </div>

                @foreach ($products as $item)
                    @php
                        $image = explode(',', $item->images);
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ $image[0] }}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
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
                                <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }} "
                                    class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi
                                    tiết</a>

                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 pb-1">
                    {{ $products->appends(request()->all())->links('front/layouts/my-pagination') }}

                </div>

            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection
