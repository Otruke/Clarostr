<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Clarostream Network - Eat Good, Live Good, Make Good Money & Build a Good Life" />
    <meta name="keywords" content="Clarostream Network, Clarostream, Network" />
    <meta name="author" content="Thompson Falowo, Otolorin Rufus" />
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
    

    <!-- New CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/new.css" />
  <!-- jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>

  <script>
    // public/js/username-check.js

    $(document).ready(function() {
        $('#sponsor').on('keyup', function() {
            var sponsor = $(this).val();

            $.ajax({
                type: 'POST',
                url: '/check-username',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'sponsor': sponsor
                },
                success: function(response) {
                    if (response.status === 'taken') {
                        $('#sponsor-message').text(' ');
                    } else {
                        $('#sponsor-message').text('invalid referral_username')
                        $('#sponsor-message').css('color', 'red');
                    }
                }
            });
        });
    });

</script>

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
        <h2><a href="{{ route('pre-launch') }}#affiliate-packages"> Welcome </a></h2>
        <a href="#0" class="cd-close">Close</a>
        <ul class="cd-dropdown-content">
            <li><a href="{{ route('pre-launch') }}">Home</a></li>   
            <li><a href="{{ route('pre-launch') }}#affiliate-packages">Compensation Plan</a></li>
            <li><a href="#">Invest</a></li>
            <!-- Auth code replacement start here -->
            <li>
          
                            <a href="{{ route('pre-launch') }}#affiliate-packages">Register</a>
                        

            </li>
            
            <!-- Auth code replacement ends here -->
        </ul>
        <!-- .cd-dropdown-content -->
    </nav>
    <div class="cp_navi_main_wrapper index2_header_wrapper index3_header_wrapper float_left">
        <div class="container-fluid">
            <div class="cp_logo_wrapper">
                <a href="{{ route('pre-launch') }}#affiliate-packages">
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
                       
                                        <a href="{{ route('pre-launch') }}#affiliate-packages">Register</a>
                            
            
                        </li>
                        
                    </ul>
                </div>
            </div>

            <!-- Auth code replacement ends here -->

            <div class="cp_navigation_wrapper">
                <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                    <ul class="main_nav_ul">
                        <li class="has-mega gc_main_navigation"><a href="{{ route('pre-launch') }}" class="gc_main_navigation active_class">Home</a></li>   
                        <li><a href="{{ route('pre-launch') }}#affiliate-packages" class="gc_main_navigation">Compensation Plan</a></li>
                        <li class="has-mega gc_main_navigation"><a href="#" class="gc_main_navigation">Invest</a></li>
                    </ul>
                </div>
                <!-- mainmenu end -->
            </div>
        </div>
    </div>

    <!-- navi wrapper End -->
    
     <div class="content"> 
        <!--Rufus Ejected code so as to extend meta, header and footer from this view to other view-->
        @yield('content')
      </div>
    

 
    <!-- footer section start-->
    <div class="footer_main_wrapper index2_footer_wrapper index3_footer_wrapper float_left">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                    <div class="wrapper_second_about">
                        <div class="wrapper_first_image">
                            <a href="{{ route('pre-launch') }}#affiliate-packages"><img id="footer-logo" src="images/footer-logo.png" class="img-responsive" alt="logo" /></a>
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
