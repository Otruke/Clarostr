@extends('master')

@section('content')



    <!-- login wrapper start -->
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                        @if ($user)  
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                    <div class="pay-now">
                                        <i class="fa fa-times warning"></i>
                                    </div>
                                      
                                    <h3> Ooops!!!! Payment Unsuccessful</h3>
                                    <p class="dashboard-note">Your Account Is Not Activated. Do you want to retry? <br>
                                     Kindly click on the button below...</p>

                                </div>

                                <div class="about_btn plans_btn text-center">
                                    <ul>
                                        <li>
                                            <a href="{{route('regpayment')}}">Retry Payment</a>
                                        </li>
                                    </ul>
                                </div>
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
   <!-- login wrapper end -->






@endsection

