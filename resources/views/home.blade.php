@extends('userdashboard')

@section('content')

<!-- Main section Start -->
<div class="l-main">
        <!--  my account wrapper start -->
        <div class="account_top_information">
            <div class="userdet uderid">
                <h3>Welcome <span class="user-name">{{ Auth::user()->first_name}} {{ Auth::user()->middle_name }}</span></h3>

                <dl class="userdescc">
                    <dt class="dashboard-note">This is your control panel where you can view your earnings, direct referrals, downlines,
                        genealogy, investment(s) and tools to help you grow your network.</dt>
                </dl>
                <label>Your Referral Link:</label>
                <p id="paragraphContent">{{ Auth::user()->referral_link}}</p>

                <!-- Button to trigger copy operation -->
                <button class="dashboard-btn" onclick="copyParagraphContent()">Copy</button>

                @if(Auth::user()->is_subscribed == 1 )
                            
                       
                    <dl class="userdescc">
                        <dt class="dashboard-note">Your next subscription of ₦10,000 will be due on 
                            <span class="next-date-txt">
                                <strong>
                                    <?php
                                        $nextBilling = new DateTime(Auth::user()->next_billing);
                                        echo $nextBilling->format('F d, Y. H:i:s');
                                    ?>
                                </strong>
                            </span> 
                        <!-- - <a href=" " class="next-payment-txt font-700"><span>Click
                                    here to make payment</span></a></dt> -->
                    </dl>
                    @if(Auth::user()->sub_status == 0)
                            
                        
                        <dl class="userdescc">
                            <dt class="dashboard-note warning"><i class="fa fa-exclamation-circle warning"></i> Your
                                subscription is overdue for renewal. Failure to make payment in <span
                                    class="overdue-date"><strong>48hrs(2 days)</strong></span> leads to the loss of all your
                                earnings for the month. <br> <a href="{{ route('subPayment') }}" class="next-payment-txt font-700"><button type="button"
                                        class="dashboard-btn">Make Payment Now</button></a></dt>
                        </dl>
                    @endif

                @else
                    <dl class="userdescc">
                        <dt class="dashboard-note warning"><i class="fa fa-exclamation-circle warning"></i> Your account is not 
                        activated and loss potential for earning. Failure to activate your account in <span
                                class="overdue-date"><strong>48hrs(2 days)</strong></span> leads to the loss of all your
                            earnings for the month. <br> <a href="{{ route('regpayment') }}" class="next-payment-txt font-700"><button type="button"
                                    class="dashboard-btn">  Activate Now</button></a></dt>
                    </dl>
                @endif

                

   
            </div>

        </div>
        <!--  my account wrapper end -->
        <!--  account wrapper start -->
        <div class="account_wrapper">

            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_1 float_left dashboard-investment_box_wrapper">
                        <a href=" ">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money-check-alt"></i>
                                <h1>Starter Income</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Amount Earned</td>
                                            <td class="package-color1"> : <span class="amount">{{ $earnings->starter_earnings }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_2 float_left dashboard-investment_box_wrapper">
                        <a href=" ">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money-check-alt"></i>
                                <h1>Affiliate Income</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Amount Earned</td>
                                            <td class="package-color1"> : <span class="amount">{{ $earnings->direct_referral_earnings }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_1 float_left dashboard-investment_box_wrapper">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money-check-alt"></i>
                                <h1>Downliners Earnings</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Amount Earned</td>
                                            <td class="package-color1"> : <span class="amount">{{ $earnings->downliners_earnings }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_2 float_left dashboard-investment_box_wrapper">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-users"></i>
                                <h1>Earn For Life</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Amount Earned</td>
                                            <td class="package-color1"> : <span class="amount">{{ $earnings->descendants_monthly_earnings + $earnings->monthly_earnings }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_1 float_left dashboard-investment_box_wrapper">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-users-cog"></i>
                                <h1>Total Income</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Return</td>
                                            <td class="package-color1"> : <span class="amount">{{ $earnings->total_earnings }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_2 float_left dashboard-investment_box_wrapper">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="far fa-money-bill-alt"></i>
                                <h1>Direct Ref To Earn</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Number</td>
                                            @if(Auth::user()->package == 'Starter' )
                                            <td class="package-color1"> : <span class="total"></span>4</td>
                                            @elseif(Auth::user()->package == 'Bronze' )
                                            <td class="package-color1"> : <span class="total"></span>8</td>
                                            @elseif(Auth::user()->package == 'Silver' )
                                            <td class="package-color1"> : <span class="total"></span>15</td>
                                            @elseif(Auth::user()->package == 'Gold' )
                                            <td class="package-color1"> : <span class="total"></span>25</td>
                                            @else(Auth::user()->package == 'Diamond' )
                                            <td class="package-color1"> : <span class="total"></span>Unlimited</td>
                                            @endif

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_1 float_left dashboard-investment_box_wrapper">
                        <a href=" ">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money-check-alt"></i>
                                <h1>Food Vest</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Amount Earned</td>
                                            <td class="package-color1"> : <span class="amount">0</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_2 float_left dashboard-investment_box_wrapper">
                        <a href=" ">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money-check-alt"></i>
                                <h1>Referrals</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Number</td>
                                            <td class="package-color1"> : <span class="total">{{ auth::user()->direct_downlines_count }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div> -->

                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_2 float_left dashboard-investment_box_wrapper">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="far fa-money-bill-alt"></i>
                                <h1>Downliners To Earn</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Number</td>
                                            @if(Auth::user()->package == 'Starter' )
                                            <td class="package-color1"> : <span class="total"></span>16</td>
                                            @elseif(Auth::user()->package == 'Bronze' )
                                            <td class="package-color1"> : <span class="total"></span>256</td>
                                            @elseif(Auth::user()->package == 'Silver' )
                                            <td class="package-color1"> : <span class="total"></span>4096</td>
                                            @elseif(Auth::user()->package == 'Gold' )
                                            <td class="package-color1"> : <span class="total"></span>65536</td>
                                            @else(Auth::user()->package == 'Diamond' )
                                            <td class="package-color1"> : <span class="total"></span>Unlimited</td>
                                            @endif

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
                    <div class="investment_box_wrapper color_1 float_left dashboard-investment_box_wrapper">
                        <a href="#">
                            <div class="investment_icon_wrapper float_left">
                                <i class="fa fa-money-check-alt"></i>
                                <h1>Downlines</h1>
                            </div>

                            <div class="invest_details float_left">
                                <table class="invest_table">
                                    <tbody>
                                        <tr>
                                            <td class="package-color1">Total Number</td>
                                            <td class="package-color1"> : <span class="total">{{ $downlinersCount }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--  account wrapper end -->
        <!--  transactions wrapper start -->
        <!-- <div class="last_transaction_wrapper float_left">

            <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="sv_heading_wraper heading_wrapper_two">

                        <h3>Recent Transactions</h3>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="trans-history-cta heading_wrapper_two text-right text-mobile-left">

                        <a class="trans-history" href="transaction-history.html">
                            <h5>Transaction History <i class="fas fa-angle-double-right"></i> </h5>
                        </a>

                    </div>
                </div>
                <div class="crm_customer_table_main_wrapper float_left">
                    <div class="crm_ct_search_wrapper">
                        <div class="crm_ct_search_bottom_cont_Wrapper">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper">
                            <thead>
                                <tr>
                                    <th class="width_table1">Transcation ID</th>
                                    <th class="width_table1">Amount (&#x20A6;)</th>
                                    <th class="width_table1">Description</th>
                                    <th class="width_table1">Payment mode</th>
                                    <th class="width_table1">Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="background_white">

                                    <td>
                                        <div class="media cs-media">

                                            <div class="media-body">
                                                <h5>CS10066</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">12000</div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">New User Enrollment</div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">Transfer</div>
                                    </td>

                                    <td class="flag">
                                        <div class="pretty p-svg p-curve">04/11/2023</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="more-info" href="">
                                            <div class="pretty p-svg p-curve"> <i class="fas fa-receipt"></i> Print Receipt</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="background_white">

                                    <td>
                                        <div class="media cs-media">

                                            <div class="media-body">
                                                <h5>CS1004411</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">8000.00</div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">Monthly Membership</div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">Deposit</div>
                                    </td>

                                    <td class="flag">
                                        <div class="pretty p-svg p-curve">01/11/2023</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="more-info" href="">
                                            <div class="pretty p-svg p-curve"> <i class="fas fa-receipt"></i> Print Receipt</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="background_white">

                                    <td>
                                        <div class="media cs-media">

                                            <div class="media-body">
                                                <h5>CS1004411</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">8000.00</div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">Monthly Membership</div>
                                    </td>
                                    <td>
                                        <div class="pretty p-svg p-curve">Deposit</div>
                                    </td>

                                    <td class="flag">
                                        <div class="pretty p-svg p-curve">01/10/2023</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="more-info" href="">
                                            <div class="pretty p-svg p-curve"> <i class="fas fa-receipt"></i> Print Receipt</div>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> -->
        <!--  transactions wrapper end -->
@endsection
