@extends('userdashboard')

@section('content')

<div class="l-main">
        <!-- referrals wrapper start -->
        <div class="view_profile_wrapper_top float_left mt-175">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper">

                        <h3 class="dashboard-title">My Earning - Monthly Breakdown</h3>

                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="view_profile_wrapper float_left mb-5">
                        <div class="userdescc">
                            <h4 class="dashboard-note font-700 text-color-orange">See Your Earning breakdown
                            </h4>
                        </div>
                        <div class="row">

                            <div class="crm_customer_table_main_wrapper float_left">
                                <div class="crm_ct_search_wrapper">
                                    <div class="crm_ct_search_bottom_cont_Wrapper">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="earning-details-table"
                                        class="table cs-table crm_customer_table_inner_Wrapper mt-5">
                                        <tbody>
                                            @foreach($withdrawalDetails as $detail)
                                            
                                            <tr class="background_white">

                                                <td>Withdrawal Date</td>
                                                <td><?php
                                                        $created = new DateTime($detail->created_at);
                                                        echo $created->format('F d, Y. H:i:s');
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Starter Pack</td>
                                                <td><span class="amount">{{$detail->starter_earnings}}</span></td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Monthly Pack Bonus</td>
                                                <td><span class="amount">{{$detail->monthly_earnings}}</span></td>
                                            </tr>
                                            

                                            <tr class="background_white">

                                                <td>Direct Affiliate Income</td>
                                                <td><span class="amount">{{$detail->direct_referral_earnings}}</span></td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Earn For Life Income</td>
                                                <td><span class="amount">{{$detail->descendants_monthly_earnings}}</span></td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Activation Income On Downlines:</td>
                                                <td><span class="amount">{{$detail->downliners_earnings}}</span></td>
                                            </tr>
                                            <tr class="background_white">

                                                <td>Total:</td>
                                                <td><span class="amount">{{$detail->total_earnings}}</span></td>
                                            </tr>
                                           @endforeach



                                        </tbody>
                                    </table>
                                    <button class="earning-info-btn" onclick="javascript:history.back()"><i class="fa fa-arrow-left"></i> Back</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- referrals wrapper end -->

        
    </div>
   
    <!-- main box wrapper End-->

@endsection