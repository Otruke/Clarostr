<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Congratulations</title>
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
    
    <style>
        .sv_heading_wraper {
            float: none;
        }
     </style>

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

<body>
    <!-- preloader Start -->
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="images/loader.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <div class="cursor"></div>
    <!-- Top Scroll Start -->
    <a href="javascript:" id="return-to-top"> <i class="fas fa-angle-double-up"></i></a>

    <!-- navi wrapper End -->


   <!-- login wrapper start -->
   <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                        @if ($user)    
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" >
                                @csrf
                                <div class="">
                                    <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                        <div class="pay-now">
                                            <i class="fa fa-user-check"></i>
                                        </div>
                                        
                                        <h3> Registration Successful</h3>
                                        <p class=""><strong>Dear {{ $user->first_name }}, </strong> Please note that the payment date will be communicated to you via email. Keep an eye on your inbox for further instructions.</p>

                                    </div>
                                    
                                    <div class="login_remember_box">
                                    </div>
                                    <div class="about_btn login_btn register_btn pr-0" style="display: none">
                                        <button type="submit" class="text-uppercase font-weight-bold" >Register Others</button>
                                    </div>

                                </div>
                            </form>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Perform the logout via AJAX
                                    fetch('{{ route('logout') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    }).then(response => {
                                        if (response.ok) {
                                            console.log('Logged out successfully');
                                        } else {
                                            console.error('Logout failed');
                                        }
                                    }).catch(error => {
                                        console.error('Logout error:', error);
                                    });
                                });
                            </script>

                        @else
                            <div class="text-center" >
                                <p style="color: #ff0f0f;">
                                    Not allowed, Please register or Login first.
                                </p>

                                <div class="about_btn plans_btn">
                                    <ul>
                                        <li>
                                            <a href="{{ route('welcome') }}#affiliate-packages">Register</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login wrapper end -->


    

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
