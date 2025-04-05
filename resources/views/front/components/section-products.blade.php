   <section class="container-fluid py-5">
        @foreach($categoriesWithProducts as $categoryWithProducts)
            <div class="mb-5 pb-5 px-xl-5">
                <h3 class="text-uppercase pb-3 " style="border-bottom: 1px solid #cccdd3;">{{ $categoryWithProducts['category']->name }}</h3>
                <div class="row g-4 pt-3">
                    <div class="col-lg-3">
                        <div class="card h-100">
                            <div class="card-body p-0 position-relative">
                                <div class="position-absolute top-0 start-0 w-100 h-100">
                                    @php
                                    $bannerImage=[
                                        'thoi-trang-nam'=>"banner-nam.webp",
                                        'thoi-trang-nu'=>"banner-nu.webp",
                                        'do-tre-em'=>"banner-tre-em.webp"
                                                ];
                                    $bannerImage=$bannerImage[$categoryWithProducts['category']->slug] ?? 'banner-nam.webp';
                                    @endphp
                                    <img src="{{ asset('/front/img/'.$bannerImage) }}" alt="Banner" class="img-fluid w-100 h-100 rounded" style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="swiper product-slider-{{ $categoryWithProducts['category']->slug }}">
                            <div class="swiper-wrapper">
                                @foreach($categoryWithProducts['products'] as $product)
                                    <div class="swiper-slide">
                                        <div class="card border-1 p-3 pb-0 h-100">
                                            @if($product->discount)
                                                <div class="position-absolute top-0 end-0 bg-danger text-white rounded-circle p-2">
                                                    -{{ round(($product->price - $product->discount) / $product->price * 100) }}%
                                                </div>
                                            @endif
                                            <a href="{{ route('detail', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                                <img src="{{ explode(',', $product->images)[0] }}" alt="{{ $product->name }}" class="card-img-top" style="height: 300px; object-fit: cover;">
                                            </a>
                                            <div class="card-body text-center">
                                                <a href="{{ route('detail', ['id' => $product->id, 'slug' => $product->slug]) }}">
                                                    <h5 class="card-title fs-6">{{ $product->name }}</h5>
                                                </a>
                                                <p class="text-danger fw-bold fs-6 mb-0">
                                                    {{ number_format($product->discount ?: $product->price, 0, '.', '.') }}đ
                                                    @if($product->discount)
                                                        <del class="text-muted">{{ number_format($product->price, 0, '.', '.') }}đ</del>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next "></div>
                            <div class="swiper-button-prev "></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
