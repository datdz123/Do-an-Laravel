@extends('front/layouts/masterlayout')
@section('content')
@section('title', 'Thanh toán')
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


@php
    if (Auth::check()) {
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;
        $user_phone = Auth::user()->phone;
    } else {
        $user_id = '';
        $user_name = '';
        $user_email = '';
        $user_phone = '';
    }
@endphp

<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form action="" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin, địa chỉ</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name"
                                type="text" placeholder="Phạm Văn A"
                                value="{{ old('name') ? old('name') : $user_name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tỉnh</label>
                            <select class="selectProvinces custom-select" name="provincial" style="width: 100%;">
                            </select>
                            @error('provincial')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                type="email" placeholder="example@email.com"
                                value="{{ old('email') ? old('email') : $user_email }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Huyện</label>
                            <select class="custom-select selectDistricts" name="district" style="width: 100%;">
                                <option value="">-- Chọn Huyện --</option>
                            </select>
                            @error('district')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control @error('phone') is-invalid @enderror" name="phone"
                                type="text" placeholder="+123 456 789"
                                value="{{ old('phone') ? old('phone') : $user_phone }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phường</label>
                            <select name="ward" class="custom-select selectWards" id=""
                                style="width: 100%;">
                                <option value="">-- Chọn Phường --</option>
                            </select>
                            @error('ward')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" name="note" id="">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ đường phố</label>
                            <textarea class="form-control @error('street_address') is-invalid @enderror" name="street_address" id="">{{ old('street_address') }}</textarea>
                            @error('street_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng số đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Các sản phẩm</h5>
                        @foreach ($cart->items as $key => $item)
                            @php
                                $product = \App\Models\Product::find($item['product_id']);
                            @endphp
                            <div class="d-flex justify-content-between">
                                <p>{{ $product->name }} / {{ $item['size'] }} x {{ $item['qty'] }}</p>

                                {{-- <small class="pt-1">(0 Nhập xét)</small> --}}
                                <p>{{ number_format($item['price'] * $item['qty'], 0, '.', '.') }} VND</p>
                            </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng phụ</h6>
                            <h6 class="font-weight-medium">{{ number_format($cart->total_price, 0, '.', '.') }} VND
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Vận chuyển</h6>
                            <h6 class="font-weight-medium">Miễn phí</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng</h5>
                            <h5 class="font-weight-bold">{{ number_format($cart->total_price, 0, '.', '.') }} VND</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        @if(env('VNP_TMNCODE') && env('VNP_HASHSECRET'))
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input value="online payment" type="radio" class="custom-control-input"
                                    name="payment_method" id="online">
                                <label class="custom-control-label" for="online">Thanh toán online (VN Pay)</label>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input checked value="payment on delivery" type="radio"
                                    class="custom-control-input" name="payment_method" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name="redirect"
                            class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt
                            hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Checkout End -->

@section('js')

    <script src="{{ asset('front/js/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.selectProvinces').select2()
        $('.selectDistricts').select2()
        $('.selectWards').select2()
    </script>

    <script>
        $(document).ready(function() {
            $.get('https://provinces.open-api.vn/api/?depth=3', function(req) {
                let contentProvinces = '<option value="">-- Chọn tỉnh --</option>'
                let contentDistricts = ''
                let contentWards = ''
                //Tỉnh
                let provincial = '{{ old('provincial') }}'
                req.forEach(item => {
                    let selected = provincial === item.name ? 'selected' : ""
                    contentProvinces +=
                        '<option ' + selected + ' value="' +
                        item.name + '">' + item.name +
                        '</option>'
                })
                $('.selectProvinces').html(contentProvinces)
                //Huyện

                $('.selectProvinces').change(function(e) {
                    contentDistricts = '<option value="">-- Chọn Huyện --</option>'
                    contentWards = '<option value="">-- Chọn Phường --</option>'
                    e.preventDefault();
                    var nameProvinces = $('.selectProvinces').val()
                    if (nameProvinces === 'null') {
                        contentDistricts = '<option value="">-- Chọn Huyện --</option>'
                        contentWards = '<option value="">-- Chọn Phường --</option>'
                        $('.selectDistricts').html(contentDistricts)
                        $('.selectWards').html(contentWards)
                    }

                    req.forEach(item => {
                        if (item.name === nameProvinces) {
                            item.districts.forEach(item => {
                                contentDistricts += '<option value="' + item.name +
                                    '">' + item.name + '</option>'
                            })
                            $('.selectDistricts').html(contentDistricts)
                            $('.selectWards').html(contentWards)
                        }
                    })

                    //Phường
                    $('.selectDistricts').change(function(e) {
                        contentWards = '<option value="">-- Chọn Phường --</option>'
                        e.preventDefault();
                        var nameDistricts = $('.selectDistricts').val()
                        req.forEach(item => {
                            if (item.name === nameProvinces) {
                                item.districts.forEach(item => {
                                    if (item.name === nameDistricts) {
                                        item.wards.forEach(item => {
                                            contentWards +=
                                                '<option value="' +
                                                item.name + '">' +
                                                item.name +
                                                '</option>'
                                        });
                                    }
                                });
                                $('.selectWards').html(contentWards)
                            }
                        })
                    });

                })

            })
        })

        //hiện thị old địa chỉ
        window.onload = function() {
            $.get('https://provinces.open-api.vn/api/?depth=3', function(req) {
                var nameProvinces = '{{ old('provincial') }}'
                let districts = '{{ old('district') }}'
                let wards = '{{ old('ward') }}'
                let contentDistricts = ''
                let contentWards = ''
                if (nameProvinces) {
                    req.forEach(item => {
                        if (item.name === nameProvinces) {
                            item.districts.forEach(item => {
                                let selectedDistricts = districts === item.name ?
                                    'selected' : ""
                                contentDistricts += '<option ' + selectedDistricts +
                                    ' value="' + item.name +
                                    '">' + item.name + '</option>'
                            })
                            $('.selectDistricts').html(contentDistricts)
                        }
                    })
                }
                if (districts) {
                    var nameDistricts = $('.selectDistricts').val()
                    req.forEach(item => {
                        if (item.name === nameProvinces) {
                            item.districts.forEach(item => {
                                if (item.name === nameDistricts) {
                                    item.wards.forEach(item => {
                                        let selectedWards = wards === item
                                            .name ?
                                            'selected' : ""
                                        contentWards +=
                                            '<option ' + selectedWards + ' value="' +
                                            item.name + '">' +
                                            item.name +
                                            '</option>'
                                    });
                                }
                            });
                            $('.selectWards').html(contentWards)
                        }
                    })
                }
            })
        }
    </script>
@endsection

@endsection
