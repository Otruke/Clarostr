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
