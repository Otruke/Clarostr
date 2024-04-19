@extends('master')

@section('title', 'Reset')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
          +                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- inner header wrapper start -->
<div class="page_title_section">

<div class="page_header">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-9 col-12 col-sm-8">

                <h1>Reset Password</h1>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-4">
                <div class="sub_title_section">
                    <ul class="sub_title">
                        <li> <a href="index.html"> Home </a>&nbsp; / &nbsp; </li>
                        <li>Reset Password</li>
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
            <div class="login_top_box login_top_box_two">
                <form action="{{ route('password.update') }}" method="post" id="">
                    <div class="login_form_wrapper register_wrapper">
                        <div class="sv_heading_wraper heading_wrapper_dark dark_heading hwd">
                        @csrf
                            <h3> Reset Password</h3>
                            <p>Fill the fields below to finish create a new password</p>
                        
                        </div>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group icon_form comments_form register_contact">
                                    <label for="email" class="field-label">Email</label>
                                    <input id="email" type="email" class="form-control require@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group icon_form comments_form register_contact">
                                    <label for="new-password" class="field-label">New Password</label>
                                    <input id="new-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group icon_form comments_form register_contact">
                                    <label for="confirm-password" class="field-label">Confirm Password</label>
                                    <input id="confirm-password" type="password" class="form-control require" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>
                        </div>
                        
                        <div class="login_remember_box">
                        </div>
                        <div class="about_btn login_btn register_btn float_left">
                            <button type="submit" class="">Confirm Password</button>
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
