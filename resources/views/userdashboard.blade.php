<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Clarostream Network | Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/flaticon2.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/nice-select.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/datatables.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/dropify.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/reset.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/nice-select.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('')}}css/new.css" />
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />
</head>

<body>
    <!-- preloader Start -->
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="../images/loader.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <div class="cursor"></div>
    <!-- Top Scroll Start -->
    <a href="javascript:" id="return-to-top"> <i class="fas fa-angle-double-up"></i></a>
    <!-- Top Scroll End -->
    <!-- cp navi wrapper Start -->
    <nav class="cd-dropdown index3_cd_dropdown d-block d-sm-block d-md-block d-lg-none d-xl-none">
        <h2><a href="{{ route('home')}}"> Hi, {{ Auth::user()->first_name}}</a></h2>
        <a href="#" class="cd-close">Close</a>
        <ul class="cd-dropdown-content mobile-menu">
            <li class="mobile-menu-active"><a href="{{ route('home')}}">
                    <i class="fa fa-tachometer-alt dashboard-icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('membership') }}">
                    <i class="fa fa fa-crown dashboard-icon"></i>
                    <span>My Membership</span>
                </a>
            </li>
            <li>
                <a href="{{ route('upline') }}">
                    <i class="fa fa-user-tag dashboard-icon"></i>
                    <span>My Upline</span>
                </a>
            </li>
            <li>
                <a href="{{ route('showdirect', ['username' => auth()->user()->username]) }}">
                    <i class="fa fa-users dashboard-icon"></i>
                    <span>My Referrals</span>
                </a>
            </li>
            <li>
                <a href="{{ route('downliners', ['username' => auth()->user()->username]) }}">
                    <i class="fa fa-users-cog dashboard-icon"></i>
                    <span>My Downlines</span>
                </a>
            </li>
            <li>
                <a href="{{ route('generationTree', ['username' => auth()->user()->username]) }}">
                    <i class="fab fa-sourcetree dashboard-icon"></i>
                    <span>Geneaolgy</span>
                </a>
            </li>
            <li>
                <a href="{{ route('earnings') }}">
                    <i class="fa fa-money-check-alt dashboard-icon"></i>
                    <span>My Earnings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('foodVest')}}">
                    <i class="fa fa-money-bill-wave dashboard-icon"></i>
                    <span>Food Vest Investment</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}">
                    <i class="fa fa-user dashboard-icon"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('help')}}">
                    <i class="fa fa-address-book dashboard-icon"></i>
                    <span>Help</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt dashboard-icon"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                        </form>
            </li>
        </ul>
        <!-- .cd-dropdown-content -->
    </nav>
    <div class="cp_navi_main_wrapper inner_header_wrapper index2_header_wrapper index3_header_wrapper float_left">
        <div class="container-fluid">
            <div class="cp_logo_wrapper">
                <a href="{{ route('home')}}">
                    <img class="main-logo" src="../images/logo.png" alt="Clarostream Logo">
                </a>
            </div>
            <!-- mobile menu area start -->
            <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cd-dropdown-wrapper">
                                <a class="house_toggle" href="#0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177"
                                        style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve"
                                        width="25px" height="25px">
                                        <g>
                                            <g>
                                                <path class="menubar"
                                                    d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z"
                                                    fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar"
                                                    d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z"
                                                    fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar"
                                                    d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z"
                                                    fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar"
                                                    d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z"
                                                    fill="#e67805" />
                                            </g>
                                            <g>
                                                <path class="menubar"
                                                    d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z"
                                                    fill="#e67805" />
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
            <div class="top_header_right_wrapper dashboard_right_Wrapper">
                <div class="crm_profile_dropbox_wrapper">
                    <div class="nice-select" tabindex="0"> <span id="user-current" class="current">
                        @if (auth()->user()->gender == 'male')
                            <!-- <i class="fas fa-male" style="color: #03502c;"></i> -->
                            <i class="fas fa-user-tie"></i>
                        @else
                            <!-- <i class="fas fa-female" style="color: #03502c;"></i> -->
                            <i class="fas fa-user"></i>
                        @endif
                            <span>hi, {{ Auth::user()->first_name}}</span> | <span class="user-level"><i class="fa fa-crown"></i> <span class="user-level-title">{{ Auth::user()->package}}</span></span>
                            <span class="hidden_xs_content"></span></span>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- navi wrapper End -->
    <!-- inner header wrapper start -->
    <div class="page_title_section dashboard-page-title-section">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-8 col-12 col-sm-8">

                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="{{ route('home') }}"> Home </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
    <!-- Sidebar -->
    <div class="l-sidebar">
        <div class="l-sidebar__content">
            <nav class="c-menu js-menu" id="mynavi">
                <ul class="u-list crm_drop_second_ul">
                    <li class="c-menu__item sidebar-active has-sub crm_navi_icon_cont">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-tachometer-alt dashboard-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('membership') }}">
                            <i class="fa fa-crown dashboard-icon"></i>
                            <span>My Membership</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('upline') }}">
                            <i class="fa fa-user-tag dashboard-icon"></i>
                            <span>My Upline</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('showdirect', ['username' => auth()->user()->username]) }}">
                            <i class="fa fa-users dashboard-icon"></i>
                            <span>My Referrals</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('downliners', ['username' => auth()->user()->username]) }}">
                            <i class="fa fa-users-cog dashboard-icon"></i>
                            <span>My Downlines</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('generationTree', ['username' => auth()->user()->username]) }}">
                            <i class="fab fa-sourcetree dashboard-icon"></i>
                            <span>Geneaolgy</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('earnings', ['username' => auth()->user()->username]) }}">
                            <i class="fa fa-money-check-alt dashboard-icon"></i>
                            <span>My Earnings</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route( 'foodVest' )}}">
                            <i class="fa fa-money-bill-wave dashboard-icon"></i>
                            <span>Food Vest Investment</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-user dashboard-icon"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{route('help')}}">
                            <i class="fa fa-address-book dashboard-icon"></i>
                            <span>Help</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="c-menu__item has-sub crm_navi_icon_cont">
                        <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt dashboard-icon"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Sidebar ends -->
    @yield('content')
        <!--  footer  wrapper start -->
        <div class="copy_footer_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="crm_left_footer_cont">
                            <p>2023 Copyright © <a href="#"> Clarostream </a> . All Rights Reserved.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--  footer  wrapper end -->
    <!-- main box wrapper End-->
    <!--custom js files-->
    <script src="{{ asset('')}}js/new.js"></script>
    <script src="{{ asset('')}}js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('')}}js/bootstrap.min.js"></script>
    <script src="{{ asset('')}}js/modernizr.js"></script>
    <script src="{{ asset('')}}js/jquery.menu-aim.js"></script>
    <script src="{{ asset('')}}js/plugin.js"></script>
    <script src="{{ asset('')}}js/jquery.countTo.js"></script>
    <script src="{{ asset('')}}js/dropify.min.js"></script>
    <script src="{{ asset('')}}js/jquery.inview.min.js"></script>
    <script src="{{ asset('')}}js/jquery.magnific-popup.js"></script>
    <script src="{{ asset('')}}js/owl.carousel.js"></script>
    <script src="{{ asset('')}}js/datatables.js"></script>
    <script src="{{ asset('')}}js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('')}}js/calculator.js"></script>
    <script src="{{ asset('')}}js/custom.js"></script>
    <!-- custom js-->

</body>

</html>