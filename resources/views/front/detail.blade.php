@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Chi tiết sản phẩm')
@include('front.components.top-bar')



<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">

                    @foreach (getMultipleImages($product_detail->images) as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img class="w-100 h-100" src="{{ $item }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>


        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product_detail->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    @if (count($productComments) != 0)
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i - 0.5 == $avgRating)
                                <small class="fas fa-star-half-alt"></small>
                            @elseif($i <= $avgRating)
                                <small class="fas fa-star"></small>
                            @else
                                <small class="far fa-star"></small>
                            @endif
                        @endfor
                    @else
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                    @endif
                </div>
                <small class="pt-1">({{ count($productComments) }} Nhập xét)</small>
            </div>
            @if ($product_detail->discount)
                <h3>{{ number_format($product_detail->discount, 0, '.', '.') }} VND</h3>
                <h6 class="text-muted ml-2"><del>{{ number_format($product_detail->price, 0, '.', '.') }} VND</del></h6>
            @else
                <h3>{{ number_format($product_detail->price, 0, '.', '.') }} VND</h3>
            @endif
            <p class="mb-4">{{ $product_detail->description }}</p>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product_detail->id }}">
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    @php
                        $sizes = explode(',', $product_detail->size);
                    @endphp
                    @foreach ($sizes as $key => $item)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="{{ $item }}" {{ $key == 0 ? 'checked' : '' }} type="radio"
                                class="custom-control-input" id="size-{{ $key }}" name="size">
                            <label class="custom-control-label"
                                for="size-{{ $key }}">{{ $item }}</label>
                        </div>
                    @endforeach

                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="qty" class="form-control bg-secondary text-center"
                            value="1">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    @if ($product_detail->qty <= 0)
                    <button type="button" disabled class="btn btn-primary px-3"><i
                        class="fa fa-ban mr-1"></i> Sản phẩm đã hết hàng</button>
                    @else
                    <button onclick="unPayNow()" type="submit" class="btn btn-primary px-3"><i
                            class="fa fa-shopping-cart mr-1"></i> Thêm
                        vào giỏ</button>
                    <input id="pay_now" type="hidden" name="pay_now" value="false">
                    <button onclick="payNow()" type="submit" class="btn btn-outline-primary px-3 ml-3">Mua
                        ngay</button>
                    {{-- </div> --}}
                    @endif
                </div>

            </form>

            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
            <div class="">Còn: {{ $product_detail->qty }} </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá
                    ({{ count($productComments) }})</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Mô tả sản phẩm</h4>
                    {!! $product_detail->content !!}
                </div>

                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">{{ count($productComments) }} Đánh giá cho "{{ $product_detail->name }}"</h4>
                            <div id="show_comments">
                                @foreach ($productComments as $item)
                                    <div class="media mb-4">
                                        <img src="{{ url('front/img/productComment.jpg') }}" alt="Image"
                                            class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{ $item->user->name }}<small> -
                                                    <i>{{ $item->created_at }}</i></small>
                                            </h6>
                                            <div class="text-primary mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $item->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p>{{ $item->messages }}.</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="col-md-6">
                                <h4 class="mb-4">Để lại đánh giá</h4>
                                {{-- <small>Your email address will not be published. Required fields are marked *</small> --}}
                                <form method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá sao * :</p>
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <div class="rating"></div>
                                    <div class="form-group">
                                        <label for="message">Đánh giá của bạn *</label>
                                        <textarea id="message" name="messages" cols="30" rows="5"
                                            class="form-control @error('messages') is-invalid @enderror"></textarea>
                                        <div class="messages"></div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input id="send" type="button" value="Đánh giá"
                                            class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="col-md-6">

                                <a href="{{ route('loginUser') }}?redirect_uri={{url()->full()}}"> Đăng nhập để đánh giá</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
{{-- @php
    dd($relatedProducts->count());
@endphp --}}
                @foreach ($relatedProducts as $item)
                    <div class="card product-item border-0">
                        <div
                            class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{getImageUrl($item->images) }}" alt="">
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
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Products End -->

@section('js')
    <script type="text/javascript">
        function payNow() {
            $('#pay_now').val('true')
        }

        function unPayNow() {
            $('#pay_now').val('false')
        }
    </script>

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
        $('#send').click(function(e) {
            e.preventDefault()
            var _token = $('input[name="_token"]').val()
            var user_id = $('input[name="user_id"]').val()
            var email = $('input[name="email"]').val()
            var rating = $('input[name="rating"]:checked').val()
            var messages = $('textarea[name="messages"]').val()
            var product_id = {{ $product_detail->id }}
            $.ajax({
                url: "",
                method: "POST",
                data: {
                    user_id: user_id,
                    email: email,
                    rating: rating,
                    messages: messages,
                    product_id: product_id,
                    _token: _token
                },
                dataType: "JSON",
                success: function(response) {

                    if (response.errors) {
                        let resp = response.errors;
                        $(".rating").html(``)
                        $(".messages").html(``)
                        for (index in resp) {
                            $("." + index).html(`<div class="alert alert-danger">${resp[index]}</div>`);
                        }
                    }
                    if (response.success) {
                        let resp = response.success

                        Swal.fire({
                            title: `${resp}`,
                            icon: 'success',
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        $(".rating").html(``)
                        $(".messages").html(``)

                        $(".rate").html(`
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                        `)
                        $("#message").val("")

                        $('#show_comments').html(response.output)
                    }

                },
            });
        })
    </script>
@endsection

@endsection
