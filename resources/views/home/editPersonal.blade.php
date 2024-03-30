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
                                        <form method="POST" action="{{ route('editPersonal2') }}" id="editPersonalForm">
                                        @csrf
                                            <table
                                            class="table referral-list-table cs-table crm_customer_table_inner_Wrapper my-profile-table">
                                            
                                                <thead>
                                                    <tr>
                                                        <th class="width_table1" colspan="2">Edit Personal Details</th>
                                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr class="background_white">

                                                        <td><label for="first_name" class="field-label">First Name</label></td>
                                                        <td><input id="first-name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  autocomplete="first_name" autofocus>
                                                                @error('first_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </td>
                                                    </tr>
                                                    <tr class="background_white">

                                                        <td><label for="last_name" class="field-label">Last Name</label></td>
                                                        <td><input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  autocomplete="name" autofocus>
                                                            @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
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

                                                        <td><label for="gender" class="field-label">Gender</label></td>
                                                        <td><select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender"  autofocus>
                                                                <option>Choose gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                            @error('gender')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr class="background_white">

                                                        <td><label for="address" class="field-label">Address</label></td>
                                                        <td><input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" maxlength="200" autocomplete="name" autofocus>
                                                            @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr class="background_white">

                                                        <td><label for="state" class="field-label">State</label></td>
                                                        <td><input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" maxlength="50"  autocomplete="name" autofocus>
                                                            @error('state')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr class="background_white">

                                                        <td><label for="country" class="field-label">Country</label></td>
                                                        <td><input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" maxlength="50"  autocomplete="name" autofocus>
                                                            @error('country')
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
                                    <div class="table-responsive">
                                        <table
                                            class="table referral-list-table cs-table crm_customer_table_inner_Wrapper mt-5 my-profile-table">
                                            <thead>
                                                <tr>
                                                    <th class="width_table1" colspan="2">Bank Details</th>
                                                                    
                                                </tr>
                                            </thead>
                                        <tbody>
                                            
                                            <tr class="background_white">

                                                <td>Bank Name:</td>
                                                <td>{{Auth::user()->bank_name}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Bank Account Name:</td>
                                                <td>{{Auth::user()->bank_account_name}}</td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Account Number</td>
                                                <td>{{Auth::user()->bank_account_number}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('editBank')}}"><button class="dashboard-btn">Edit</button></a>

                                </div>
                            </div>
                        </div>

                        
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
