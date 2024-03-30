@extends('master')

@section('content')

<!-- login wrapper start -->
 <div class="login_wrapper fixed_portion float_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="login_top_box login_top_box_two">
                        <form action="{{ route('login') }}" method="post" id="loginForm">
                            @csrf
                            <div class="login_form_wrapper register_wrapper">
                                <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                                    <h3> Sign In</h3>
                                    <p>Simply provide your details below to login.</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="email" class="field-label">Email</label>
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" required name="email" autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group icon_form comments_form register_contact">
                                            <label for="password" class="field-label">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="show-password" onclick="togglePasswordVisibility('password')">Show Password</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="login_remember_box">
                                    <label class="control control--checkbox">Remember me
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="control__indicator"></span>
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forget_password">
                                            Forgot Password
                                        </a>
                                    @endif
                                </div>
                                <div class="about_btn login_btn register_btn float_left">
                                    <button type="submit" >Login</button>
                                </div>
                                <div class="dont_have_account float_left">
                                    <p>Don’t have an account? <a href="{{ route('welcome')}}#affiliate-packages">Sign up</a></p>
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
