


@extends('master')

@section('content')



    <!-- login wrapper start -->
    <div class="login_wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pay-now-box p-lg-5 p-sm-5 p-sm-3">
                      
                            
                        <form method="POST" action="{{ route('transfer') }}" id="earning withdrawal">
                                    {{ csrf_field() }}
                                
                                    <div class="">
                                        <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                        <div class="pay-now">
                                        <i class="fas fa-money-check"></i>
                                            </div>
                                            <h3> Hi, {{ Auth::user()->first_name}} 2222</h3>
                                            <p class="dashboard-note">Kindly click on the button below to withdraw your earnings.</p>

                                        </div>
                                        <input class="form-control" id="accountname" name="account_name" placeholder="Account Name">
                                        <input name="account_bank" value="033" placeholder="Bank Account"/>
                                        <input name="email" type="email" placeholder="email"/>
                                        <input name="account_number" type="number" placeholder="account Number"/>
                                        <input name="currency" value="NGN" />
                                        <input name="amount" >
                                        <input type="hidden" name="narration" value="Withdrawal" />
                                        <input type="hidden" name="description" value="Wdrw"  />
                                        
                                        <div class="login_remember_box">
                                        </div>
                                        <div class="about_btn login_btn register_btn pr-0">
                                            <button type="submit" class="text-uppercase font-weight-bold" >Pay Now</button>
                                        </div>
                                    </div>
                                </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- login wrapper end -->






@endsection
