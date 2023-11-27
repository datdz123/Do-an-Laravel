

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border border-white px-3 mr-1">{{$site->site_name}}</span></h1>
                </a>
                <p>{{$site->site_description}}</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> {{$site->site_address}}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{$site->site_email}}</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>{{$site->site_phone}}</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Đường dẫn nhanh</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{route('home')}}"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>  
                            <a class="text-dark mb-2" href="{{route('shop')}}"><i class="fa fa-angle-right mr-2"></i>Shop now</a>  
                            <a class="text-dark mb-2" href="{{route('cart')}}"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>  
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Thông tin</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Về chúng tôi</a>
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Chính sách đổi trả</a>
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Chính sách bảo hành</a>
                            <a class="text-dark" href=""><i class="fa fa-angle-right mr-2"></i>Câu hỏi thường gặp</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Bản tin</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Đăng ký ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="{{route('home')}}">{{$site->site_name}}</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{url('front/img/payments.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    @include('sweetalert::alert')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('front/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('front/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js')}}"></script>

    @yield('js')

</body>

</html>