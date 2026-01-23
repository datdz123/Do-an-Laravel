{{-- Component: AI Product Recommendations --}}
{{-- Sử dụng: @include('front.components.ai-recommendations', ['recommendations' => $recommendations, 'alsoBought' => $alsoBought]) --}}

@if(isset($recommendations) && $recommendations->count() > 0)
<div class="container-fluid py-5 bg-light">
    <div class="row px-xl-5">
        <div class="col-12">
            <div class="text-center mb-4">
                <h2 class="section-title px-5">
                    <span class="px-2 position-relative">
                        <i class="fas fa-lightbulb text-primary mr-2"></i>
                        {{ __('Gợi ý sản phẩm') }}
                    </span>
                </h2>
                <p class="text-muted">{{ __('Dựa trên hành vi mua sắm của bạn') }}</p>
            </div>
            <div class="owl-carousel recommendation-carousel">
                @foreach ($recommendations as $item)
                <div class="card product-item border-0 h-100">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }}">
                            <img class="img-fluid w-100" src="{{ getImageUrl($item->images) }}"
                                alt="{{ $item->name }}" style="height: 250px; object-fit: cover;">
                        </a>
                        @if($item->discount)
                        <span class="badge badge-danger position-absolute" style="top: 10px; right: 10px;">
                            -{{ round((($item->price - $item->discount) / $item->price) * 100) }}%
                        </span>
                        @endif
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">
                            <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                class="text-dark text-decoration-none">
                                {{ $item->name }}
                            </a>
                        </h6>
                        <div class="d-flex justify-content-center">
                            @if ($item->discount)
                            <h6 class="text-primary">{{ number_format($item->discount, 0, '.', '.') }} VND</h6>
                            <h6 class="text-muted ml-2"><del>{{ number_format($item->price, 0, '.', '.') }} VND</del></h6>
                            @else
                            <h6 class="text-primary">{{ number_format($item->price, 0, '.', '.') }} VND</h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }}"
                            class="btn btn-sm text-dark p-0">
                            <i class="fas fa-eye text-primary mr-1"></i>{{ __('Xem chi tiết') }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

{{-- Phần "Người khác cũng mua" --}}
@if(isset($alsoBought) && $alsoBought->count() > 0)
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-12">
            <div class="text-center mb-4">
                <h2 class="section-title px-5">
                    <span class="px-2">
                        <i class="fas fa-users text-success mr-2"></i>
                        {{ __('Người khác cũng mua') }}
                    </span>
                </h2>
            </div>
            <div class="row">
                @foreach ($alsoBought as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-3">
                    <div class="card product-item border-0 h-100">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }}">
                                <img class="img-fluid w-100" src="{{ getImageUrl($item->images) }}"
                                    alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-2">
                            <h6 class="text-truncate mb-2">
                                <a href="{{ route('detail', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                    class="text-dark text-decoration-none small">
                                    {{ $item->name }}
                                </a>
                            </h6>
                            <div class="d-flex justify-content-center">
                                @if ($item->discount)
                                <small class="text-primary font-weight-bold">{{ number_format($item->discount, 0, '.', '.') }} VND</small>
                                @else
                                <small class="text-primary font-weight-bold">{{ number_format($item->price, 0, '.', '.') }} VND</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<style>
    .ai-badge {
        position: absolute;
        top: -10px;
        right: -30px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-size: 10px;
        padding: 2px 8px;
        border-radius: 10px;
        font-weight: bold;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.8;
        }
    }

    .recommendation-carousel .product-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .recommendation-carousel .product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .recommendation-carousel .product-img img {
        transition: transform 0.3s ease;
    }

    .recommendation-carousel .product-item:hover .product-img img {
        transform: scale(1.05);
    }
</style>

<script>
    $(document).ready(function() {
        // Initialize recommendation carousel if exists
        if ($('.recommendation-carousel').length) {
            $('.recommendation-carousel').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    }
                }
            });
        }
    });
</script>