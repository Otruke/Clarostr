<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Clarostream Network - Eat Good, Live Good, Make Good Money & Build a Good Life</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Clarostream Network - Eat Good, Live Good, Make Good Money & Build a Good Life" />
    <meta name="keywords" content="Clarostream Network, Clarostream, Network" />
    <meta name="author" content="Thompson Falowo" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/flaticon.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="vcss/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/nice-select.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/datatables.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/dropify.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/reset.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/new.css" />
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('')}}images/favicon.png" />
</head>

<body id="homepage">
    <!-- preloader Start -->
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="{{ asset('')}}images/loader.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <div class="cursor cursor3"></div>
    <!-- Top Scroll Start -->
    <a href="javascript:" id="return-to-top" class="index3_scroll"> <i class="fas fa-angle-double-up"></i></a>
    <!-- Top Scroll End -->
    <!-- cp navi wrapper Start -->
    <nav class="cd-dropdown index3_cd_dropdown d-block d-sm-block d-md-block d-lg-none d-xl-none">
        <h2><a href="{{ route('welcome') }}"> Welcome </a></h2>
        <a href="#0" class="cd-close">Close</a>
        <ul class="cd-dropdown-content">
            <li><a href="{{ route('welcome') }}">Home</a></li>   
            <li><a href="{{ route('welcome') }}#affiliate-packages">Compensation Plan</a></li>
            <li><a href="#">Invest</a></li>
            <!-- Auth code replacement start here -->
            <li>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('welcome') }}#affiliate-packages">Register</a>
                        @endif

            </li>
            <li>
                        
                         <a href="{{ route('login') }}">Member Login</a>
                    @endauth
                @endif
            </li>
            <!-- Auth code replacement ends here -->
        </ul>
        <!-- .cd-dropdown-content -->
    </nav>
    <div class="cp_navi_main_wrapper index2_header_wrapper index3_header_wrapper float_left">
        <div class="container-fluid">
            <div class="cp_logo_wrapper">
                <a href="{{ route('welcome') }}#affiliate-packages">
                    <img class="main-logo" src="images/logo.png" alt="Clarostream Logo">
                </a>
            </div>
            <!-- mobile menu area start -->
            <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cd-dropdown-wrapper">
                                <a class="house_toggle" href="#0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                        <g>
                                            <g>
                                                <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#e67805" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <!-- .cd-dropdown -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .cd-dropdown-wrapper -->
            </header>
            <!-- Auth code replacement start here -->
            <div class="top_header_right_wrapper top_phonecalls">
    <div class="header_btn index3_header_btn">
        <ul>
            <li>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('welcome') }}#affiliate-packages">Register</a>
                        @endif
                        

            </li>
            <li>
                            <a href="{{ route('login') }}">Member Login</a>
                    @endauth
                @endif
            </li>
        </ul>
    </div>
</div>

            <!-- Auth code replacement ends here -->

            <div class="cp_navigation_wrapper">
                <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                    <ul class="main_nav_ul">
                        <li class="has-mega gc_main_navigation"><a href="{{ route('welcome') }}" class="gc_main_navigation active_class">Home</a></li>   
                        <li><a href="{{ route('welcome') }}#affiliate-packages" class="gc_main_navigation">Compensation Plan</a></li>
                        <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation">Invest</a></li>
                    </ul>
                </div>
                <!-- mainmenu end -->
            </div>
        </div>
    </div>

    <!-- navi wrapper End -->
    <!-- slider wrapper start -->
    <div class="slider-area slider_index2_wrapper slider_index3_wrapper  float_left">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="carousel-captions caption-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-10 col-md-12 col-sm-12 col-12">
                                    <div class="content">

                                        <h2 data-animation="animated fadeIn">Welcome to Clarostream Network</h2>

                                        <h3 data-animation="animated fadeIn">Where You Can Achieve Financial<br> <span>Stability</span></h3>

                                        <p data-animation="animated fadeIn">Are you tired of the 9-to-5 grind, looking for a lucrative opportunity 
                                            to earn big, and longing for financial freedom? Look no further because Clarostream Network is your gateway 
                                            to prosperity, and we have various offers you can't resist! Within the Clarostream network, we have multiple 
                                            financial reward systems integrated in our affiliate platform to help you earn.</p>

                                        <div class="slider_btn index2_sliderbtn index3_sliderbtn float_left">
                                            <ul>
                                                <li data-animation="animated fadeIn">
                                                    <a href="#affiliate-packages">Start Now</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                                    <div id="new_slider_main_img_wrapper" class="content overflow-visible pt-150">
                                        <div class="clip-circle"></div>
                                        <img class="slideImage" src="images/slide.jpg" alt="img" class="img-responsive">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider wrapper End -->
    <!--investment plan wrapper start -->
    <section>
        <div id="affiliate-packages" class="investment_plans float_left">
            <div class="investment_overlay"></div>
            <div class="container">
                <div class="row">
    
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper heading_wrapper_dark">
                            
                            <h3> Our Membership Packages </h3>
                            <h4>To be part of our membership reward systems, it is required to sign up for any of the packages below. When you sign up, 
                                you get an instant Starter Pack reward as per the package you register on. </h4>
    
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="investment_box_wrapper float_left">
                            <div class="investment_content_wrapper">
                                <h1><a href="#">Starter</a></h1>
                                <p><span>Registration Fee: </span><span class="amount">12,500</span>
                                    <br> <span>Starter Pack Bonus: </span><span class="amount">2,500</span>
                                    <br> <span>Monthly Activation: </span><span class="amount">8,000</span>
                                    <br> <span>Monthly Pack Bonus: </span><span class="amount">2,000</span>
                                    <br> <span>Dir. Downline Income: </span><span class="amount">5,000</span>
                                    <br> <span>Earning Level: </span><span><strong>1 - 2</strong></span>
                                    <br> <span>Earn 4 Life Per Downline: </span><span class="amount">100</span>
                                    <br> <span>Activation Income Per Downline: </span><span class="amount">1000</span>
                                </p>
                            </div>
                            <div class="about_btn plans_btn">
                                <ul>
                                    <li>
                                        <a href="/register?sponsor={{ $referralUsername }}&amount=12500&package=Starter">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="investment_box_wrapper float_left">
                            <div class="investment_content_wrapper">
                                <h1><a href="#">Bronze</a></h1>
                                <p><span>Registration Fee: </span><span class="amount">25,000</span>
                                    <br> <span>Starter Pack Bonus: </span><span class="amount">5,000</span>
                                    <br> <span>Monthly Activation: </span><span class="amount">8,000</span>
                                    <br> <span>Monthly Pack Bonus: </span><span class="amount">2,000</span>
                                    <br> <span>Dir. Downline Income: </span><span class="amount">10,000</span>
                                    <br> <span>Earning Level: </span><span><strong>3 - 4</strong></span>
                                    <br> <span>Earn 4 Life Per Downline: </span><span class="amount">100</span>
                                    <br> <span>Activation Income Per Downline: </span><span class="amount">1000</span>
                                </p>
                            </div>
                            <div class="about_btn plans_btn">
                                <ul>
                                    <li>
                                        <a href="/register?sponsor={{ $referralUsername }}&amount=25000&package=Bronze">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="investment_box_wrapper float_left">
                            <div class="investment_content_wrapper">
                                <h1><a href="#">Silver</a></h1>
                                <p><span>Registration Fee: </span><span class="amount">50,000</span>
                                    <br> <span>Starter Pack Bonus: </span><span class="amount">7,500</span>
                                    <br> <span>Monthly Activation: </span><span class="amount">8,000</span>
                                    <br> <span>Monthly Pack Bonus: </span><span class="amount">2,000</span>
                                    <br> <span>Dir. Downline Income: </span><span class="amount">20,000</span>
                                    <br> <span>Earning Level: </span><span><strong>5 - 6</strong></span>
                                    <br> <span>Earn 4 Life Per Downline: </span><span class="amount">100</span>
                                    <br> <span>Activation Income Per Downline: </span><span class="amount">1000</span>
                                </p>
                            </div>
                            <div class="about_btn plans_btn">
                                <ul>
                                    <li>
                                        <a href="/register?sponsor={{ $referralUsername }}&amount=50000&package=Silver">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="investment_box_wrapper float_left">
                            <div class="investment_content_wrapper">
                                <h1><a href="#">Gold</a></h1>
                                <p><span>Registration Fee: </span><span class="amount">75,000</span>
                                    <br> <span>Starter Pack Bonus: </span><span class="amount">10,000</span>
                                    <br> <span>Monthly Activation: </span><span class="amount">8,000</span>
                                    <br> <span>Monthly Pack Bonus: </span><span class="amount">2,000</span>
                                    <br> <span>Dir. Downline Income: </span><span class="amount">30,000</span>
                                    <br> <span>Earning Level: </span><span><strong>7 - 8</strong></span>
                                    <br> <span>Earn 4 Life Per Downline: </span><span class="amount">100</span>
                                    <br> <span>Activation Income Per Downline: </span><span class="amount">1000</span>
                                </p>
                            </div>
                            <div class="about_btn plans_btn">
                                <ul>
                                    <li>
                                        <a href="/register?sponsor={{ $referralUsername }}&amount=75000&package=Gold">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6 col-12">
                        <div class="investment_box_wrapper float_left">
                            <div class="investment_content_wrapper">
                                <h1><a href="#">Diamond</a></h1>
                                <p><span>Registration Fee: </span><span class="amount">100,000</span>
                                    <br> <span>Starter Pack Bonus: </span><span class="amount">15,000</span>
                                    <br> <span>Monthly Activation: </span><span class="amount">8,000</span>
                                    <br> <span>Monthly Pack Bonus: </span><span class="amount">2,000</span>
                                    <br> <span>Dir. Downline Income: </span><span class="amount">40,000</span>
                                    <br> <span>Earning Level: </span><span><strong>9 - 10</strong></span>
                                    <br> <span>Earn 4 Life Per Downline: </span><span class="amount">100</span>
                                    <br> <span>Activation Income Per Downline: </span><span class="amount">1000</span>
                                </p>
                            </div>
                            <div class="about_btn plans_btn">
                                <ul>
                                    <li>
                                        <a href="/register?sponsor={{ $referralUsername }}&amount=100000&package=Diamond">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--investment plan wrapper end -->
    <!-- global community wrapper start -->
    <div class="global_community_wrapper index2_global_community_wrapper index3_global_community float_left">
        <div class="container">
            <div class="row">
                <div class="global_comm_wraper index2_global_comm_wrapper index3_global_comm_wrapper">
                    <h1>Our mission for every member is – To elevate the health and the financial wellbeing of every member.</h1>
                    <p>We want you to know that this is not a platform for quick money or overnight success. 
                        This is a real business "people franchise" which has to build,grow,scale before you 
                        start enjoying for generations.
                    </p>
                    <p>It will take the duration of 2-24months of building your clarostream business before you start enjoying 
                        outstanding success. It may be instant success but we are talking about sustained success.
                    </p>
                </div>
                <div class="zero_balance_wrapper">
                    <div class="zero_commisition">
                        <h1>Participate In Our Food Vest Investment</h1>
                    </div>
                    <div class="start_invest_wrap">
                        <h1>Invest with just <br><span class="amount">50,000</span> and start earning!</h1>
                        <div class="about_btn index3_about_btn float_left">
                            <ul>
                                <li>
                                    <a href="#">Invest Now!</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global community wrapper end -->
    <!-- footer section start-->
    <div class="footer_main_wrapper index2_footer_wrapper index3_footer_wrapper float_left">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                    <div class="wrapper_second_about">
                        <div class="wrapper_first_image">
                            <a href="index.html"><img id="footer-logo" src="images/footer-logo.png" class="img-responsive" alt="logo" /></a>
                        </div>
                        <p> Clarostream Network is your gateway to prosperity, and we have various offers you can't resist! </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                    <div class="wrapper_second_useful">
                        <h4>Useful Links </h4>

                        <ul>
                            <li><a href="https://clarostream.ng/" target="_blank"><i class="fa fa-angle-right"></i>Clarostream Main</a>
                            </li>

                            <li><a href="https://store.clarostream.ng/" target="_blank"><i class="fa fa-angle-right"></i>Clarostream Store</a>
                            </li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Terms & Conditions</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                    <div class="wrapper_second_useful wrapper_second_useful_2">
                        <h4>Contact Us</h4>

                        <ul>
                            <li><a href="tel:+2348051100493"><i class="flaticon-phone-contact"></i>+2348051100493</a>
                            </li>
                            <li><a href="mailto:network@clarostream.ng"><i class="flaticon-mail"></i>network@clarostream.ng</a>
                            </li>
                            <li><a href="https://www.google.com/maps/search/?api=1&query=5%20Tawa%20Ibrahim%20Street%2C%20Ikorodu%2C%20Lagos%20State%2C%20Nigeria"><i class="flaticon-placeholder"></i>5 Tawa Ibrahim Street, Ikorodu, Lagos State, Nigeria.
                            </li> 
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="copyright_wrapper float_left">
                        <div class="copyright">
                            <p>Copyright <i class="far fa-copyright"></i> 2023 <a href="https://clarostream.ng/"> Clarostream</a>. All right reserved</p>
                        </div>
                        <div class="social_link_foter">

                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--registration auto insert values script manipulation start here-->
    <!-- footer section end-->
    <!--custom js files-->
    <script src="{{ asset('')}}js/new.js"></script>
    <script src="{{ asset('')}}js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('')}}js/bootstrap.min.js"></script>
    <script src="{{ asset('')}}js/modernizr.js"></script>
    <script src="{{ asset('')}}js/jquery.menu-aim.js"></script>
    <script src="{{ asset('')}}js/plugin.js"></script>
    <script src="{{ asset('')}}js/jquery.countTo.js"></script>
    <script src="{{ asset('')}}js/dropify.min.js"></script>
    <script src="{{ asset('')}}js/datatables.js"></script>
    <script src="{{ asset('')}}js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('')}}js/jquery.inview.min.js"></script>
    <script src="{{ asset('')}}js/jquery.magnific-popup.js"></script>
    <script src="{{ asset('')}}js/owl.carousel.js"></script>
    <script src="{{ asset('')}}js/calculator.js"></script>
    <script src="{{ asset('')}}js/custom.js"></script>
    <!-- custom js-->
</body>
</html>