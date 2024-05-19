


@extends('master')

@section('content')



    <!-- login wrapper start -->
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                        @if ($user)

                            
                            <div class="">
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                    <div class="pay-now">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                      
                                    <h3> Withdrawal Successful, {{ $user->first_name }}</h3>
                                    <p class="dashboard-note">Enjoy your cash out{{ $user->first_name }}.</p>

                                </div>
                                
                                <div class="login_remember_box">
                                </div>
                                <div class="about_btn login_btn register_btn pr-0">
                                    <button type="button" href="{{ route('home') }}" class="text-uppercase font-weight-bold">Home</button>
                                </div>
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
    </div>
   <!-- login wrapper end -->






@endsection


