@extends('master')

@section('content')

    <!-- inner header wrapper start -->
    <div class="page_title_section">

        <div class="page_header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                        <h1>register</h1>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="index.html"> Home </a>&nbsp; / &nbsp; </li>
                                <li>register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
    <!-- login wrapper start -->
    <div class="login_wrapper fixed_portion float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box">
                        <form form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                            <div class="login_form_wrapper register_wrapper">
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                    <h3> Create Your Account</h3>
                                    <p>Simply fill the form below to create your account.</p>

                                </div>

  
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="referral-username" class="field-label">Referral Username</label>
                                            <input id="referral-username" type="text" class="form-control require" name="referral-username" placeholder="clarostream">
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="package" class="field-label">Affiliate Package</label>
                                            <input type="text" name="package" value="{{ request()->query('package') }}" id="package" class="form-control" require readonly>                                               
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="amount" class="field-label">Registration Fee</label>                        
                                            <input type="text" name="amount" value="{{ request()->query('amount') }}" id="package-fee" class="form-control" require readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="user-details-heading">
                                            <h5>Personal Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="first-name" class="field-label">First Name</label>
                                            <input id="first-name" type="text" class="form-control require" name="first-name" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="middle-name" class="field-label">Middle Name</label>
                                            <input id="middle-name" type="text" class="form-control require" name="middle-name" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="last-name" class="field-label">Last Name</label>
                                            <input id="last-name" type="text" class="form-control require" name="last-name" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="gender" class="field-label">Gender</label>
                                            <select id="gender" class="form-control"required  autofocus>
                                                <option>Choose gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="phone-number" class="field-label">Phone Number</label>
                                            <input id="phone-number" type="number" class="form-control require" name="phone-number" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="email" class="field-label">Email</label>
                                            <input id="email" type="email" class="form-control require" name="email" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="address" class="field-label">Address</label>
                                            <input id="address" type="text" class="form-control require" name="address" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="state" class="field-label">State</label>
                                            <input id="state" type="text" class="form-control require" name="state" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="country" class="field-label">Country</label>
                                            <input id="country" type="text" class="form-control require" name="country" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="user-details-heading">
                                            <h5>Account Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="username" class="field-label">Username</label>
                                            <input id="username" type="text" class="form-control require" name="username" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="password" class="field-label">Password</label>
                                            <input id="password" type="password" class="form-control require" name="password" oninput="checkPasswordStrength()" required autofocus>
                                            <div id="password-strength-bar">
                                                <div id="strength-fill"></div>
                                            </div>
                                            <span class="show-password" onclick="togglePasswordVisibility('password')">Show Password</span>

        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="confirm-password" class="field-label">Confirm Password</label>
                                            <input id="confirm-password" type="password" class="form-control require" name="confirm-password" required autofocus>
                                            <span class="show-password" onclick="togglePasswordVisibility('confirm-password')">Show Password</span>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="user-details-heading">
                                            <h5>Bank Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="bank-name" class="field-label">Bank Name</label>
                                            <input id="bank-name" type="text" class="form-control require" name="bank-name" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="bank-account-name" class="field-label">Bank Account Name</label>
                                            <input id="bank-account-name" type="text" class="form-control require" name="bank-account-name" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="bank-account-num" class="field-label">Bank Account Number</label>
                                            <input id="bank-account-num" type="number" class="form-control require" name="bank-account-num" required autocomplete="name" autofocus>
        
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="login_remember_box">
                                    <label class="control control--checkbox">I agree to Clarostream Network's <span class="terms-conditions">Terms and Conditions</span>.
                                        <input type="checkbox">
                                        <span class="control__indicator"></span>
                                    </label>

                                </div>
                                <div class="about_btn login_btn register_btn float_left">

                                    <button type="submit">
                                        submit
                                    </button>
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
