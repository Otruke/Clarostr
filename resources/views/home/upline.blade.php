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
                            <!-- sponsorUser from the User model relationship -->
                            @if ($user->sponsorUser)
                        


                            <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
                                <ul class="profile_list">
                                    
                                    <li><span class="detail_left_part">Username </span> <span class="detail_right_part">
                                    {{ $user->sponsorUser->username }}</span>
                                </li>
                                    <li><span class="detail_left_part">Full Name
                                        </span> <span class="detail_right_part">{{ $user->sponsorUser->first_name }} {{ $user->sponsorUser->middle_name }}
                                        </span>
                                    </li>
                                    <li><span class="detail_left_part">Membership Level</span> <span
                                            class="detail_right_part"><i class="fa fa-crown"></i> {{ $user->sponsorUser->package }}
                                        </span>
                                    </li>
                                    <li><span class="detail_left_part">Leadership Rank</span> <span
                                        class="detail_right_part"><i class="fa fa-trophy"></i> Upcoming...
                                    </span>
                                </li>
                                    <li><span class="detail_left_part">Email Address</span> <span
                                            class="detail_right_part">{{ $user->sponsorUser->email }}</span>
                                    </li>
                                    <li><span class="detail_left_part">Mobile No</span> <span
                                            class="detail_right_part">{{ $user->sponsorUser->phone_number }}</span>
                                    </li>
                                </ul>
                            </div>

                            @else
                                <p style = " width: 100%; height: 250px; ">You have no sponsor.</p>
                                
                            @endif
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

@endsection