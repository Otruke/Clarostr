@extends('master')

@section('title', 'Sign Up')

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
    <!-- register wrapper start -->
    <div class="login_wrapper fixed_portion float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box">
                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        <div class="login_form_wrapper register_wrapper">
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">

                                    <h3> Create Your Account</h3>
                                    <p>Simply fill the form below to create your account.</p>

                                </div>

  
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="sponsor" class="field-label">Referral Username</label>
                                            <input id="sponsor" type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" Value="{{ request()->query('sponsor') }}" placeholder="clarostream">
                                            <span id="sponsor-message" class="form-text text-muted" style="color: #ff0f0f;"></span>
                                            @error('sponsor')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="package" class="field-label">Affiliate Package</label>
                                            <input type="text" name="package" value="{{ request()->query('package') }}" id="package" class="form-control @error('package') is-invalid @enderror"  readonly>  
                                            @error('package')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                             
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="amount" class="field-label">Registration Fee</label>                        
                                            <input type="text" name="amount" value="{{ request()->query('amount') }}" id="package-fee" class="form-control @error('amount') is-invalid @enderror"  readonly>
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="user-details-heading">
                                            <h5>Personal Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="first_name" class="field-label">First Name</label>
                                            <input id="first-name" type="text" class="form-control @error('first_name') is-invalid @enderror" required name="first_name"  autocomplete="first_name" autofocus>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="middle_name" class="field-label">Middle Name</label>
                                            <input id="middle-name" type="text" class="form-control @error('middle_name') is-invalid @enderror" required name="middle_name"  autocomplete="name" autofocus>
                                            @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="last_name" class="field-label">Last Name</label>
                                            <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" required name="last_name"  autocomplete="name" autofocus>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="gender" class="field-label">Gender</label>
                                            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required  autofocus>
                                                <option>Choose gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="phone_number" class="field-label">Phone Number</label>
                                            <input id="phone-number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" required name="phone_number" maxlength="15"  autocomplete="name" autofocus>
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="email" class="field-label">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="name" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="address" class="field-label">Address</label>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" maxlength="200"  required autocomplete="name" autofocus>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="state" class="field-label">State</label>
                                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" required name="state" maxlength="50"  autocomplete="name" autofocus>
                                            @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="country" class="field-label">Country</label>
                                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" required name="country" maxlength="50"  autocomplete="name" autofocus>
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" required name="username"  autocomplete="name" autofocus>
                                            <span id="username-message" class="form-text text-muted" style="color: #ff0f0f;"></span>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
        
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="password" class="field-label">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" oninput="checkPasswordStrength()" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div id="password-strength-bar">
                                                <div id="strength-fill"></div>
                                            </div>
                                            <span class="show-password" onclick="togglePasswordVisibility('password')">Show Password</span>

        
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="password_confirmation" class="field-label">Confirm Password</label>
                                            <input id="confirm-password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                                            <label for="bank_name" class="field-label">Bank Name</label>
                                            <!--<input id="bank-name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" required maxlength="200" autocomplete="name" autofocus> -->
                                            <select id="bank-name" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" required autofocus>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->name }}">{{ $bank->name }}</option>
                                            @endforeach
                                            </select>
                                            @error('bank_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="bank_account_name" class="field-label">Bank Account Name</label>
                                            <input id="bank-account-name" type="text" class="form-control @error('bank_account_name') is-invalid @enderror" name="bank_account_name" required maxlength="200"  autocomplete="name" autofocus>
                                            @error('bank_account_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="bank_account_number" class="field-label">Bank Account Number</label>
                                            <input id="bank-account-num" type="number" class="form-control @error('bank_account_number') is-invalid @enderror" name="bank_account_number" required maxlength="12"  autocomplete="name" autofocus>
                                            @error('bank_account_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <div class="terms-of-use text-left">
                                                <h4 class="font-700">Terms of Use Agreement for Clarostream Network</h4>
                                                <p>These Terms of Use ("Agreement") are entered into between you ("User"
                                                    or "You") and Clarostream Network ("Clarostream," "We," "Us," or
                                                    "Our"). By accessing or using Clarostream Network's website,
                                                    services, and any related features (collectively, the "Platform"),
                                                    you agree to comply with and be bound by the terms and conditions
                                                    set forth in this Agreement. If you do not agree to the Terms, do
                                                    not use the Platform. These terms are subject to change at any time;
                                                    we therefore encourage you to periodically review the Terms to
                                                    ensure that ou are aware of any changes.</p>
                                                <ol>
                                                    <li><span class="font-700 point-head">Acceptance of Terms:</span> <br>By
                                                        accessing, using, or registering on the Platform, you
                                                        acknowledge that you have read, understood, and agree to be
                                                        bound by the terms and conditions of this Agreement. If you do
                                                        not agree to these terms, please do not use the Platform.</li>
                                                    <li><span class="font-700 point-head">User Eligibility:</span><br>You must be
                                                        at least 18 years old to use the Platform. By using the
                                                        Platform, you represent and warrant that you are at least 18
                                                        years old and have the legal capacity to enter into this
                                                        Agreement.</li>
                                                    <li><span class="font-700 point-head">Account Registration:</span><br>To access
                                                        certain features of the Platform, you may be required to
                                                        register for an account. You agree to provide accurate, current,
                                                        and complete information during the registration process and to
                                                        update such information to keep it accurate, current, and
                                                        complete.</li>
                                                    <li><span class="font-700 point-head">User Responsibilities:</span><br>You are
                                                        responsible for maintaining the confidentiality of your account
                                                        and password and for restricting access to your computer or
                                                        device. You agree to accept responsibility for all activities
                                                        that occur under your account or password.</li>
                                                    <li><span class="font-700 point-head">Prohibited Conduct:</span><br>You agree
                                                        not to engage in any conduct that:
                                                        <ul>
                                                            <li>Violates any applicable laws or regulations.</li>
                                                            <li>Infringes on the rights of others, including
                                                                intellectual property rights.
                                                                Harasses, threatens, or discriminates against others.
                                                            </li>
                                                            <li>Interferes with the operation of the Platform.</li>
                                                            <li>Attempts to gain unauthorized access to the Platform or
                                                                another user's account.</li>
                                                        </ul>
                                                    </li>
                                                    <li><span class="font-700 point-head">Content on the Platform:</span><br>You
                                                        understand and agree that all content, including but not limited
                                                        to text, graphics, images, and information, provided on the
                                                        Platform is the sole responsibility of the person from whom such
                                                        content originated.</li>
                                                    <li><span class="font-700 point-head">Intellectual Property:</span><br>The
                                                        content on the Platform, including trademarks, service marks,
                                                        and logos, is owned or licensed by Clarostream and is protected
                                                        by intellectual property laws. You agree not to use, reproduce,
                                                        distribute, or create derivative works based on the Platform's
                                                        content without prior written consent from Clarostream.</li>
                                                    <li><span class="font-700 point-head">Privacy Policy:</span><br>Your use of the
                                                        Platform is governed by our Privacy Policy, which can be found
                                                        here. By using the Platform, you consent to the terms of the
                                                        Privacy Policy.Click here to see Privacy Policy.</li>
                                                    <li><span class="font-700 point-head">Termination:</span><br>Clarostream
                                                        reserves the right to suspend or terminate your access to the
                                                        Platform at its sole discretion for any reason, including a
                                                        breach of this Agreement.
                                                    </li>
                                                    <li><span class="font-700 point-head">Changes to Terms:</span><br>Clarostream
                     s                                   may modify this Agreement at any time. You are responsible for
                                                        regularly reviewing these terms. Continued use of the Platform
                                                        after changes constitutes acceptance of the modified terms.</li>
                                                    <li><span class="font-700 point-head">Contact Information:</span><br>For
                                                        questions or concerns regarding this Agreement, please contact
                                                        us at <a href="mailto:network@clarostream.ng">network@clarostream.ng</a></li>
                                                </ol>

                                            </div>

                                        </div>
                                    </div>
                                
                                 <div class="login_remember_box">
                                    <label class="control control--checkbox">I agree to Clarostream Network's <span class="terms-conditions">Terms and Conditions</span>.
                                        <input type="checkbox" required >
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
    <!-- register wrapper end -->
@endsection
