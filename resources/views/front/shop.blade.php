@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Shop')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cửa hàng của chúng tôi</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Color Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Danh mục sản phẩm</h5>
                {{-- <form method="GET"> --}}
                {{-- @csrf --}}
                <form method="GET" action="{{ route('shop') }}">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" {{ request('id') == '' ? 'checked' : '' }} type="checkbox"
                            class="custom-control-input" id="size-all">
                        <label class="custom-control-label" for="size-all">Tất cả</label>
                        <span
                            class="badge border font-weight-normal">{{ App\Models\Product::where('status', 'active')->count() }}</span>

                    </div>
                </form>
                @php
                    showCategories($categories);
                @endphp
                @php
                    
                    function showCategories($categories, $parent_id = 0, $char = '')
                    {
                        foreach ($categories as $key => $item) {
                            // Nếu là chuyên mục con thì hiển thị
                    
                            //count 
                            $countProducts = App\Models\Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                                ->select('products.*', 'product_categories.parent_id')
                                ->where('product_categories.parent_id', $item->id)
                                ->where('status', 'active')
                                ->count();

                            $countSubcategory =  App\Models\Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                                ->select('products.*', 'product_categories.parent_id')
                                ->where('product_categories.id', $item->id)
                                ->where('status', 'active')
                                ->count();
                    
                            $checked = request('id') == $item->id ? 'checked' : '';
                            if ($item['parent_id'] == $parent_id) {
                                // Xử lý hiển thị chuyên mục
                                if ($item->parent_id == 0) {
                                    echo ' <form method="GET" action="' .
                                        route('shop/category', ['id' => $item->id, 'slug' => $item->slug]) .
                                        '">
                                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                            <input ' .
                                        $checked .
                                        '   onclick="this.form.submit()"  type="checkbox" class="custom-control-input" value="' .
                                        $item->id .
                                        '"  id="idd' .
                                        $key .
                                        '">
                                    <label class="custom-control-label"  for="idd' .
                                        $key .
                                        '"> ' .
                                        $item->name .
                                        '</label>
                                    <span class="badge border font-weight-normal">' .
                                        $countProducts .
                                        '</span></div></form>';
                                } else {
                                    echo '<form method="GET" action="' .
                                        route('shop/category', ['id' => $item->id, 'slug' => $item->slug]) .
                                        '">
                                         <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                         <input ' .
                                        $checked .
                                        ' onclick="this.form.submit()" type="checkbox" class="custom-control-input" value="' .
                                        $item->id .
                                        '"  id="id' .
                                        $key .
                                        '">
                                    <label class="custom-control-label" for="id' .
                                        $key .
                                        '">' .
                                        $char .
                                        $item->name .
                                        '</label>
                                    <span class="badge border font-weight-normal">' .
                                        $countSubcategory .
                                        '</span></div></form>';
                                }
                                // Xóa chuyên mục đã lặp
                                unset($categories[$key]);
                                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                showCategories($categories, $item['id'], $char . '|--- ');
                            }
                        }
                    }
                @endphp

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


                    {{-- <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" type="checkbox" class="custom-control-input"
                          {{ request('price-all') == 'on' ? 'checked' : '' }}  id="price-all" name="price-all">
                        <label class="custom-control-label" for="price-all">Tất cả giá</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div> --}}
                    {{-- <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" type="checkbox" class="custom-control-input"
                         id="price-1" name="price[0->100000]" {{ (request('price')['0->100000'] ?? '') == 'on' ? 'checked' : '' }}  >
                        <label class="custom-control-label" for="price-1">0 - 100.000 VND</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" type="checkbox" class="custom-control-input" id="price-2"
                        name="price[100000->300000]"  {{ (request('price')['100000->300000']?? '') == 'on' ? 'checked' : '' }} >
                        <label class="custom-control-label" for="price-2">100.000 - 300.000 VND</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" type="checkbox" class="custom-control-input" id="price-3"
                        name="price[300000->500000]" {{ (request('price')['300000->500000']?? '') == 'on' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="price-3">300.000 - 500.000 VND</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input onclick="this.form.submit()" type="checkbox" class="custom-control-input" id="price-4"
                        name="price[500000->1000000]" {{ (request('price')['500000->1000000']?? '') == 'on' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="price-4">500.000 - 1.000.000 VND</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input onclick="this.form.submit()" type="checkbox" class="custom-control-input" id="price-5"
                        name="price[1000000->]" {{ (request('price')['1000000->']?? '') == 'on' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="price-5">Trên 1.000.000 VND</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div> --}}
                </form>
            </div>
            <!-- Price End -->

            <!-- Color Start -->
            {{-- <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                        <label class="custom-control-label" for="price-all">All Color</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-1">
                        <label class="custom-control-label" for="color-1">Black</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-2">
                        <label class="custom-control-label" for="color-2">White</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-3">
                        <label class="custom-control-label" for="color-3">Red</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-4">
                        <label class="custom-control-label" for="color-4">Blue</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="color-5">
                        <label class="custom-control-label" for="color-5">Green</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div> --}}
            <!-- Color End -->

            <!-- Size Start -->
            {{-- <div class="mb-5">
                <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="size-all">
                        <label class="custom-control-label" for="size-all">All Size</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-1">
                        <label class="custom-control-label" for="size-1">XS</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-2">
                        <label class="custom-control-label" for="size-2">S</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-3">
                        <label class="custom-control-label" for="size-3">M</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-4">
                        <label class="custom-control-label" for="size-4">L</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="size-5">
                        <label class="custom-control-label" for="size-5">XL</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div> --}}
            <!-- Size End -->
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
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
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
                                {{-- <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> --}}
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
