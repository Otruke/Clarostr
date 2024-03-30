@extends('userdashboard')

@section('content')

    <!-- Main section Start -->
    <div class="l-main">
         <!-- referrals wrapper start -->
        <div class="view_profile_wrapper_top float_left mt-175">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper">

                        <h3 class="dashboard-title">Withdrawal History</h3>

                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="view_profile_wrapper float_left">
                        <div class="userdescc">
                            <h4 class="dashboard-note font-700 text-color-orange">See Your Withdrawal history</h4>
                        </div>
                        <dl class="userdescc">
                            <dt class="dashboard-note">Our commission system is automated to disburse all commissions according to the algorithm provided in the system.</dt>
                        </dl>
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
                        <table id="earning-table" class="table referral-list-table cs-table crm_customer_table_inner_Wrapper">
                            <thead>
                                <tr>
                                    <th class="width_table1">Date Withdrawn</th>
                                    <th class="width_table1">Status</th>
                                    <th class="width_table1">Total Earning</th>
                                    <th class="width_table1">Details</th>    
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse($withdrawals as $withdrawal)
                                <tr class="background_white">

                                    <td>{{ $withdrawal->create_at->date_format('F d, Y') }}</td>
                                    <td>Successful</td>
                                    <td><span class="amount">{{ $withdrawal->amount}}</span></td>
                                    <td><a href="my-earnings-detail.html"><button class="dashboard-btn">Read More</button></a></td>

                                </tr>
                                @empty
                    
                                <tr class="background_white">

                                    <td colspan="4" style="text-align: center;">No Withdrawal Record. Make a withdrawal from your earnings.</td>
                                    

                                </tr>
                                
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  transactions wrapper end --> 
    

@endsection