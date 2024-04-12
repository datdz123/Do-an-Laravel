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
                            <input type="hidden" id="province_name" name="province_name">
                            <input type="hidden" id="district_name" name="district_name">
                            <input type="hidden" id="ward_name" name="ward_name">
                            <div class="col-md-6 form-group">
                                <div class="form-group">
                                    <label for="province">Tỉnh/Thành phố</label>
                                    <select id="province" name="province" class="form-control">
                                        <option value="">Chọn một tỉnh</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->province_id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                <label for="district">Quận/Huyện</label>
                                <select id="district" name="district" class="form-control">
                                    <option value="">Chọn một quận/huyện</option>
                                </select>
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
                                <label for="wards">Phường/Xã</label>
                                <select id="wards" name="wards" class="form-control">
                                    <option value="">Chọn một xã</option>
                                </select>

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

                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input value="momo_payment" type="radio" class="custom-control-input"
                                           name="payment_method" id="online">
                                    <label class="custom-control-label" for="online">Thanh toán qua MOMO</label>
                                </div>
                            </div>
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
                $('#province').on('change', function() {
                    var province_id = $(this).val();
                    var province_name = $("#province option:selected").text();
                    $('#province_name').val(province_name);
                    if (province_id) {
                        $.ajax({
                            url: `checkout/get-districts/${province_id}`, // Use template literal here
                            method: 'GET',
                            dataType: "json",
                            success: function(data) {
                                $('#district').empty();
                                $.each(data, function(i, district) {
                                    $('#district').append($('<option>', {
                                        value: district.district_id,
                                        text: district.name
                                    }));
                                });
                                $('#wards').empty();
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.log('Error: ' + errorThrown);
                            }
                        });
                    } else {
                        $('#district').empty();
                    }
                });

                $('#district').on('change', function() {
                    var district_id = $(this).val();
                    var district_name = $("#district option:selected").text();
                    $('#district_name').val(district_name);
                    if (district_id) {
                        $.ajax({
                            url: `checkout/get-wards/${district_id}`, // Use template literal here
                            method: 'GET',
                            dataType: "json",
                            success: function(data) {
                                $('#wards').empty();
                                $.each(data, function(i, wards) {
                                    $('#wards').append($('<option>', {
                                        value: wards.wards_id,
                                        text: wards.name
                                    }));
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.log('Error: ' + errorThrown);
                            }
                        });
                    } else {
                        $('#wards').empty();
                    }
                });
                $('#wards').on('change', function() {
                    var ward_id = $(this).val();
                    var ward_name = $("#wards option:selected").text();
                    $('#ward_name').val(ward_name);

                });
            });
        </script>
    @endsection
    @endsection


