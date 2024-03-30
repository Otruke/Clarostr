@extends('userdashboard')

@section('content')

<!-- Main section Start -->
<div class="l-main">
         <!-- referrals wrapper start -->
         <div class="view_profile_wrapper_top float_left mt-175">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper">

                        <h3 class="dashboard-title">MY DOWNLINERS</h3>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="view_profile_wrapper float_left">
                        <ul class="profile_list referal_list">
                            <li><span class="detail_left_part">Total Downliners
                                </span> <span id="referrals-total" class="detail_right_part">{{ $descendantsCount }}
                                </span>
                            </li>
                            <li><span class="detail_left_part">Active Downliners
                                </span> <span id="referrals-total" class="detail_right_part">{{ $activeDescendantsCount}}
                                </span>
                            </li>
                            <!-- <li><span class="detail_left_part">Total Referral Deposited Amount</span> <span class="detail_right_part amount">12,500</span>
                                </span>
                            </li> -->
                            <li><span class="detail_left_part">Referral Link</span> <span class="detail_right_part referral-link">{{ Auth::user()->referral_link}}</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- referrals wrapper end -->
       <!--  transactions wrapper start -->
       <div class="last_transaction_wrapper float_left">

        <div class="row">

            <div class="crm_customer_table_main_wrapper float_left">
                <div class="crm_ct_search_wrapper">
                    <div class="crm_ct_search_bottom_cont_Wrapper">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="referral-table" class="table referral-list-table cs-table crm_customer_table_inner_Wrapper">
                        <thead>
                            <tr>
                                <th class="width_table1">Username</th>
                                <th class="width_table1">First name</th>
                                <th class="width_table1">Membership Level</th>
                                <th class="width_table1">Status</th>
                                <th class="width_table1">E-mail</th>
                                <th class="width_table1">Phone</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse($downliners as $descendant)
                            <tr>
                                <td>{{ $descendant->username }}</td>
                                <td>{{ $descendant->first_name }}</td>
                                <td><span class="referral-membership-level">{{ $descendant->package }}</span></td>
                                <td>@if ($descendant->sub_status)
                                    <span class="active">active</span>
                                    @else
                                    <span class="inactive">inactive</span>
                                    @endif
                                </td>
                                <td>{{ $descendant->email }}</td>
                                <td>{{ $descendant->phone_number }}</td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">You do not have Downliners yet.</td>
                            </tr>
                            @endforelse    
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!--  transactions wrapper end --> 


@endsection