


@extends('master')

@section('content')



    <!-- login wrapper start -->
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                        @if ($user)
                            
                                <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                                    {{ csrf_field() }}

                                    <div class="">
                                        <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                            <div class="pay-now">
                                                <i class="fas fa-money-check"></i>
                                            </div>
                                            <h3> Hi, {{ $user->first_name }}</h3>
                                            <p class="dashboard-note">
                                                Kindly click on the button below for the upgrade payment of ₦{{ $upgradeAmount }} for {{ $newPackage }} package.
                                            </p>
                                        </div>

                                        <!-- Add other necessary form fields -->
                                        <input type="hidden" class="form-control" id="firstname" name="firstname" value="{{ $user->first_name }}">
                                        <input type="hidden" class="form-control" id="lastname" name="lastname" value="{{ $user->last_name }}">
                                        <input type="hidden" name="country" value="NG" />
                                        <input name="email" type="hidden" value="{{ $user->email }}"/>
                                        <input name="phonenumber" type="hidden" value="{{ $user->phone_number }}"/>
                                        <input name="currency" type="hidden" value="NGN" />
                                        <input type="hidden" name="amount" value="{{ $upgradeAmount }}" />
                                        <input type="hidden" name="payment_method" value="card" />
                                        <input type="hidden" name="description" value="{{ $newPackage }}" />

                                        <div class="login_remember_box">
                                            <!-- Add other necessary form fields -->
                                        </div>

                                        <div class="about_btn login_btn register_btn pr-0">
                                            <button type="submit" class="text-uppercase font-weight-bold">Pay Now</button>
                                        </div>
                                    </div>
                                </form>

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
