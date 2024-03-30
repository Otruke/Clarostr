


@extends('master')

@section('content')



    <!-- login wrapper start -->
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                        @if ($user)

                            @if(Auth::user()->is_subscribed == 1 )
                            <div class="">
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                    <div class="pay-now">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                      
                                    <h3> Thanks, {{ $user->first_name }}</h3>
                                    <p class="dashboard-note">Your {{ $user->package }} Package Registration Payment of ₦{{ $user->amount }} Was Successful.</p>

                                </div>
                                
                                <div class="login_remember_box">
                                </div>
                                <div class="about_btn login_btn register_btn pr-0">
                                    <button type="button" href="{{ route('home') }}" class="text-uppercase font-weight-bold">Home</button>
                                </div>
                            </div>

                                @else
                                <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                                    {{ csrf_field() }}
                                
                                    <div class="">
                                        <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                        <div class="pay-now">
                                        <i class="fas fa-money-check"></i>
                                            </div>
                                            <h3> Hi, {{ $user->first_name }}</h3>
                                            <p class="dashboard-note">Kindly click on the button below for the payment of ₦{{ $user->amount }} {{ $user->package }} package to complete your account registration.</p>

                                        </div>
                                        <input type="hidden" class="form-control" id="firstname" name="firstname" value="{{ $user->first_name }}">
                                        <input type="hidden" class="form-control" id="lastname" name="lastname" value="{{ $user->last_name }}">
                                        <input type="hidden" name="country" value="NG" />
                                        <input name="email" type="hidden" value="{{ $user->email }}"/>
                                        <input name="phonenumber" type="hidden" value="{{ $user->phone_number }}"/>
                                        <input name="currency" type="hidden" value="NGN" />
                                        <input name="amount" type="hidden" value="{{ $user->amount }}" />
                                        <input type="hidden" name="payment_method" value="card" />
                                        <input type="hidden" name="description" value="{{ $user->package }} Reg"  />
                                        
                                        <div class="login_remember_box">
                                        </div>
                                        <div class="about_btn login_btn register_btn pr-0">
                                            <button type="submit" class="text-uppercase font-weight-bold" >Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            @endif

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






<!-- <h3>Buy AMC Ticket N500.00</h3>
<form method="POST" action="{{ route('pay') }}" id="paymentForm">
    {{ csrf_field() }}

    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name">
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name">
    <input type="hidden" name="country" value="NG" />
    <input name="email" type="email" placeholder="Your Email" />
    <input name="phone" type="tel" placeholder="Phone number" />
    <input name="currency" type="hidden" value="NGN" />
    <input name="amount" type="hidden" value="7000" />
    <input type="hidden" name="payment_method" value="both" />


    <input type="submit" value="Buy" />
</form> -->