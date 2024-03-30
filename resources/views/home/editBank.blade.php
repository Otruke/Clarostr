@extends('userdashboard')

@section('content')

    <!-- Main section Start -->
    <div class="l-main">
        <!--  profile wrapper start -->
        <div class="view_profile_wrapper_top float_left upline-profile">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="view_profile_wrapper float_left">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                <div class="profile_view_img">
                                    <img src="../images/user/user.png" alt="post_img">

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="crm_customer_table_main_wrapper float_left">
                                <div class="crm_ct_search_wrapper">
                                    <div class="crm_ct_search_bottom_cont_Wrapper">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table
                                        class="table referral-list-table cs-table crm_customer_table_inner_Wrapper my-profile-table">
                                        <thead>
                                            <tr>
                                                <th class="width_table1" colspan="2">Personal Details</th>
                                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr class="background_white">

                                                <td>First Name:</td>
                                                <td>{{ Auth::user()->first_name}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Last Name:</td>
                                                <td>{{ Auth::user()->last_name}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Email:</td>
                                                <td>{{Auth::user()->email}}</td>
                                            </tr>
                                            

                                            <tr class="background_white">

                                                <td>Phone:</td>
                                                <td>{{Auth::user()->phone_number}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Username:</td>
                                                <td>{{Auth::user()->username}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Password:</td>
                                                <td>*************</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Gender:</td>
                                                <td>{{ Auth::user()->gender}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Address:</td>
                                                <td>{{ Auth::user()->address}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>State:</td>
                                                <td>{{ Auth::user()->state}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Country:</td>
                                                <td>{{ Auth::user()->country}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('editPersonal')}}"><button class="dashboard-btn">Edit</button></a>

                                </div>
                                <div class="table-responsive">
                                    <form method="POST" action="{{ route('editBank2') }}" id="registerForm">
                                    @csrf
                                        <table
                                            class="table referral-list-table cs-table crm_customer_table_inner_Wrapper mt-5 my-profile-table">
                                            <thead>
                                                <tr>
                                                    <th class="width_table1" colspan="2">Bank Details</th>
                                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr class="background_white">

                                                    <td><label for="bank_name" class="field-label">Bank Name</label></td>
                                                    <td><!--<input id="bank-name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" required maxlength="200" autocomplete="name" autofocus> -->
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
                                                    </td>
                                                </tr>
                                                <tr class="background_white">

                                                    <td><label for="bank_account_name" class="field-label">Bank Account Name</label></td>
                                                    <td><input id="bank-account-name" type="text" class="form-control @error('bank_account_name') is-invalid @enderror" name="bank_account_name" required maxlength="200"  autocomplete="name" autofocus>
                                                        @error('bank_account_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr class="background_white">

                                                    <td><label for="bank_account_number" class="field-label">Account Number</label></td>
                                                    <td><input id="bank-account-num" type="number" class="form-control @error('bank_account_number') is-invalid @enderror" name="bank_account_number" required maxlength="12"  autocomplete="name" autofocus>
                                                        @error('bank_account_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="dashboard-btn">Submit</button>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="modal fade question_modal" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="sv_question_pop float_left">
                                                <h1>User Security
                                                </h1>
                                                <div class="search_alert_box float_left">
                                                    <p>Please enter your valid Transaction Pin and edit your account
                                                        details</p>
                                                    <div class="change_field">

                                                        <input type="text" name="full_name"
                                                            placeholder="Please enter your transaction pin">
                                                    </div>

                                                </div>
                                                <div class="question_sec float_left">
                                                    <div class="about_btn ques_Btn">
                                                        <ul>
                                                            <li>
                                                                <a href="#">login</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cancel_wrapper">
                                                        <a href="#" class="" data-dismiss="modal">cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--  profile wrapper end -->
        <!--  footer  wrapper start -->
        <div class="copy_footer_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="crm_left_footer_cont">
                            <p>2023 Copyright © <a href="#"> Clarostream </a> . All Rights Reserved.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--  footer  wrapper end -->
    <!-- main box wrapper End-->

@endsection
