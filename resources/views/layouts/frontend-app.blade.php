<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/slick-theme.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
</head>
<body>

    <!--Heaer Section Start-->
    <div class="header_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="header_area">
                        <div class="logo">
                            <a href="index.php">
                                <img src="{{ asset('public/frontend/img/logo.png') }}" alt="logo...">
                            </a>
                        </div>
                        <div class="search_bar">
                            <form class="search">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fas fa-search"></i>Search</button>
                            </form>
                        </div>
                        <div class="header_info">
                            <ul>
                                <li>
                                    <a href="">
                                        <i class="fas fa-user"></i>Sign In
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fas fa-envelope"></i>Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fas fa-rupee-sign"></i>Ordres
                                    </a>
                                </li>
                                <li>
                                    <a href="join-now.php">
                                        <i class="fas fa-user"></i>Free Join
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Heaer Section End-->
    @yield('content')

    <!--Footer Section Start-->
    <div class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer_area">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="footer">
                                    <h4>General Links</h4>
                                    <ul>
                                        <li>
                                            <a href="">About us</a>
                                        </li>
                                        <li>
                                            <a href="">Contact us</a>
                                        </li>
                                        <li>
                                            <a href="">feedback</a>
                                        </li>
                                        <li>
                                            <a href="">Testimonials</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="footer">
                                    <h4>Our Services</h4>
                                    <ul>
                                        <li>
                                            <a href="">Advertise with us</a>
                                        </li>
                                        <li>
                                            <a href="">Membership Plan</a>
                                        </li>
                                        <li>
                                            <a href="">Banner Advertisement</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="footer">
                                    <h4>Buyers</h4>
                                    <ul>
                                        <li>
                                            <a href="">Post Your Requirement</a>
                                        </li>
                                        <li>
                                            <a href="">Browse Suppliers</a>
                                        </li>
                                        <li>
                                            <a href="">Country Suppliers</a>
                                        </li>
                                        <li>
                                            <a href="">Buyer FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="footer">
                                    <h4>Sellers</h4>
                                    <ul>
                                        <li>
                                            <a href="">Sell Your Product</a>
                                        </li>
                                        <li>
                                            <a href="">Lastest Buyleads</a>
                                        </li>
                                        <li>
                                            <a href="">Seller FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="social">
                                    <h4>Follow Us</h4>
                                    <ul>
                                        <li class="facebook">
                                            <a href="">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="">
                                                <i class="fab fa-instagram-square"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Footer Section End-->

    <!--Copyright Section Start-->
    <div class="copyright_section">
        <p>
            Copyright &copy; 2021.All Right Reserved
        </p>
    </div>
    <!--Copyright Section End-->

    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/custom.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
                autoplay: true
            });
            $("#category").owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });
        });
    </script>
</body>
</html>