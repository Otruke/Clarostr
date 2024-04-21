


@extends('master')

@section('content')



    <!-- login wrapper start -->
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                            
                        <form >
                                
                                    <div class="">
                                        <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                        <div class="pay-now">
                                        <i class="fas fa-money-check"></i>
                                            </div>
                                            <h3> Oops, {{ $user->first_name }}</h3>
                                            <p class="dashboard-note">Your withdrawable earning is below limit for withdrawal. Kindly make sure to earn up to ₦2,500 naira after which you can make a successful withdrawal.</p>

                                        </div>
                        </form>
                        <div class="about_btn plans_btn">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}#affiliate-packages">Dashboard</a>
                                    </li>
                                </ul>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- login wrapper end -->






@endsection
