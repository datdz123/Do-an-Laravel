    <div class="footer bg-dark text-light py-5 mt-5">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-5">
                    <a href="" class="text-decoration-none">
                        <h2 class="text-light mb-4">
                            <span class="text-primary font-weight-bold px-3 py-2 border border-primary">{{$siteSettings['site_name'] ?? config('app.name')}}</span>
                        </h2>
                    </a>
                    <p class="text-muted">{{$siteSettings['site_description'] ?? ''}}</p>
                    <div class="contact-info">
                        <p class="d-flex align-items-center mb-3">
                            <span class="icon mr-3"><i class="fa fa-map-marker-alt text-primary"></i></span>
                            <span>{{$siteSettings['site_address'] ?? ''}}</span>
                        </p>
                        <p class="d-flex align-items-center mb-3">
                            <span class="icon mr-3"><i class="fa fa-envelope text-primary"></i></span>
                            <span>{{$siteSettings['site_email'] ?? ''}}</span>
                        </p>
                        <p class="d-flex align-items-center mb-3">
                            <span class="icon mr-3"><i class="fa fa-phone-alt text-primary"></i></span>
                            <span>{{$siteSettings['site_phone'] ?? ''}}</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <h5 class="text-primary font-weight-bold mb-4">Đường dẫn nhanh</h5>
                            <div class="d-flex flex-column">
                                <a class="text-muted mb-2 hover-primary" href="{{route('home')}}">
                                    <i class="fa fa-chevron-right mr-2"></i>Trang chủ
                                </a>
                                <a class="text-muted mb-2 hover-primary" href="{{route('shop')}}">
                                    <i class="fa fa-chevron-right mr-2"></i>Shop now
                                </a>
                                <a class="text-muted mb-2 hover-primary" href="{{route('cart')}}">
                                    <i class="fa fa-chevron-right mr-2"></i>Giỏ hàng
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <h5 class="text-primary font-weight-bold mb-4">Thông tin</h5>
                            <div class="d-flex flex-column">
                                <a class="text-muted mb-2 hover-primary" href="">
                                    <i class="fa fa-chevron-right mr-2"></i>Về chúng tôi
                                </a>
                                <a class="text-muted mb-2 hover-primary" href="">
                                    <i class="fa fa-chevron-right mr-2"></i>Chính sách đổi trả
                                </a>
                                <a class="text-muted mb-2 hover-primary" href="">
                                    <i class="fa fa-chevron-right mr-2"></i>Chính sách bảo hành
                                </a>
                                <a class="text-muted hover-primary" href="">
                                    <i class="fa fa-chevron-right mr-2"></i>Câu hỏi thường gặp
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <h5 class="text-primary font-weight-bold mb-4">Đăng ký nhận tin</h5>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-dark border-dark text-light" placeholder="Họ và tên" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control bg-dark border-dark text-light" placeholder="Email"
                                        required="required" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit">Đăng ký ngay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top border-secondary mt-4">
            <div class="container py-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-md-0 text-center text-md-left text-muted">
                            &copy; <a class="text-primary font-weight-bold" href="{{route('home')}}">{{$siteSettings['site_name'] ?? config('app.name')}}</a>. 
                            Đã đăng ký bản quyền. Thiết kế bởi Quang Đạt
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-right">
                        <img class="img-fluid" src="{{url('front/img/payments.png')}}" alt="Phương thức thanh toán" style="max-height: 30px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .hover-primary:hover {
        color: #D19C97 !important;
        text-decoration: none;
        transition: all 0.3s;
    }
    .footer .form-control:focus {
        background-color: #343a40;
        border-color: #D19C97;
        box-shadow: none;
    }
    .contact-info .icon {
        width: 30px;
        display: inline-block;
    }
    </style>

    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    @include('sweetalert::alert')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('front/mail/contact.js')}}"></script>
    <script src="{{ asset('front/js/main.js')}}"></script>
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/67dd18d09b1c5d190de9b178/1imrqhrke';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    @yield('js')

</body>
</html>
