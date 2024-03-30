@extends('userdashboard')

@section('content')

    <!-- Main section Start -->
    <div class="l-main">
        <!--  my account wrapper start -->
        <div class="account_top_information account_top_information_two">
            <div class="account_overlay"></div>
            <div class="useriimg"><img src="../images/user/user.png" alt="users"></div>
            <div class="userdet uderid membership-det">
                <h3>{{ Auth::user()->first_name}}</h3>
                <dl class="userdescc">
                    <dt>Membership Fee:</dt>
                    <dd><strong><span id="current-membership-fee" class="amount">{{ Auth::user()->amount}}</span></strong></dd>  
                </dl>

                <dl class="userdescc">
                    <dt>User Level: {{ Auth::user()->level}}</dt>
                    <dd><span class="user-level"><i class="fa fa-crown"></i> <span class="user-level-title">{{ Auth::user()->package}}</span></span></dd>  
                </dl>
                <!-- <dl class="userdescc">
                    <dt>Earning Level:</dt>
                    <dd><strong><span id="earning-levels">1 - 2</span></strong></dd>  
                </dl> -->
                

            </div>

        </div>
        <!--  my account wrapper end -->
        <!--  account wrapper start -->
        @if(Auth::check() && in_array(Auth::user()->package, ['Starter', 'Bronze', 'Silver', 'Gold']))
                <div class="account_wrapper float_left account_wrapper_two">

                    <div class="row">

                        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                            <div class="sv_heading_wraper">

                                <h3>Click on any of the packages below to upgrade</h3>

                            </div>
                        </div>


                        @if(Auth::user()->package == 'Starter')
                            <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                    <div onclick="chooseNewMembershipLevel()">
                                        <a href="{{ route('upgrade', ['package' => 'Bronze']) }}">
                                            <div class="investment_box_wrapper package-box-wrapper bronze-bg">
                                                <div class="investment_icon_wrapper package_icon_wrapper">
                                                    <h1><i class="fa fa-crown dashboard-icon"></i>Bronze</h1>
                                                </div>
                    
                                                <div class="invest_details">
                                                    <table class="invest_table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="package-color1">Registration Fee</td>
                                                                <td class="package-color1"><span class="membership-fee amount">12,500</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="package-color1">Monthly Activation</td>
                                                                <td class="package-color1"><span class="amount">10,000</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="package-color1">Monthly Pack Bonus</td>
                                                                <td class="package-color1"><span class="amount">2,000</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="package-color1">Starter Pack Bonus</td>
                                                                <td class="package-color1"><span class="amount">2,500</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="package-color1">Earning Level</td>
                                                                <td class="package-color1">3 - 4</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                <div onclick="chooseNewMembershipLevel()">
                                    <a href="{{ route('upgrade', ['package' => 'Silver']) }}">
                                    <div class="investment_box_wrapper package-box-wrapper silver-bg">
                                        <div class="investment_icon_wrapper package_icon_wrapper">
                                            <h1><i class="fa fa-crown dashboard-icon"></i>Silver</h1>
                                        </div>

                                        <div class="invest_details">
                                            <table class="invest_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="package-color1">Registration Fee</td>
                                                        <td class="package-color1"><span class="membership-fee amount">37,500</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Monthly Activation</td>
                                                        <td class="package-color1"><span class="amount">10,000</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Starter Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">5,000</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Monthly Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">2,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Earning Level</td>
                                                        <td class="package-color1">5 - 6</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </a>
                            </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                <div onclick="chooseNewMembershipLevel()">
                                    <a href="{{ route('upgrade', ['package' => 'Gold']) }}">
                                    <div class="investment_box_wrapper package-box-wrapper gold-bg">
                                        <div class="investment_icon_wrapper package_icon_wrapper">
                                            <h1><i class="fa fa-crown dashboard-icon"></i>Gold</h1>
                                        </div>

                                        <div class="invest_details">
                                            <table class="invest_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="package-color1">Registration Fee</td>
                                                        <td class="package-color1"><span class="membership-fee amount">62,500</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Monthly Activation</td>
                                                        <td class="package-color1"><span class="amount">10,000</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Starter Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">7,500</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Monthly Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">2,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Earning Level</td>
                                                        <td class="package-color1">7 - 8</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                </a>
                            </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                <div onclick="chooseNewMembershipLevel()">
                                    <a href="{{ route('upgrade', ['package' => 'Diamond']) }}">
                                    <div class="investment_box_wrapper package-box-wrapper diamond-bg">
                                        <div class="investment_icon_wrapper package_icon_wrapper">
                                            <h1><i class="fa fa-crown dashboard-icon"></i>Diamond</h1>
                                        </div>

                                        <div class="invest_details">
                                            <table class="invest_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="package-color1">Registration Fee</td>
                                                        <td class="package-color1"><span class="membership-fee amount">87,500</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Monthly Activation</td>
                                                        <td class="package-color1"><span class="amount">10,000</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Starter Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">12,500</span></td>
                                                    </tr>
                                                    
                                                    
                                                    <tr>
                                                        <td class="package-color1">Monthly Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">2,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Earning Level</td>
                                                        <td class="package-color1">9 - 10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </a>
                            </div>
                            </div>

                        @elseif (Auth::user()->package == 'Bronze')
                        
                        <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                            <div onclick="chooseNewMembershipLevel()">
                                <a href="{{ route('upgrade', ['package' => 'Silver']) }}">
                                <div class="investment_box_wrapper package-box-wrapper silver-bg">
                                    <div class="investment_icon_wrapper package_icon_wrapper">
                                        <h1><i class="fa fa-crown dashboard-icon"></i>Silver</h1>
                                    </div>

                                    <div class="invest_details">
                                        <table class="invest_table">
                                            <tbody>
                                                <tr>
                                                    <td class="package-color1">Registration Fee</td>
                                                    <td class="package-color1"><span class="membership-fee amount">25,000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="package-color1">Monthly Activation</td>
                                                    <td class="package-color1"><span class="amount">10,000</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="package-color1">Starter Pack Bonus</td>
                                                    <td class="package-color1"><span class="amount">2,500</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="package-color1">Monthly Pack Bonus</td>
                                                    <td class="package-color1"><span class="amount">2,000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="package-color1">Earning Level</td>
                                                    <td class="package-color1">5 - 6</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </a>
                        </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                            <div onclick="chooseNewMembershipLevel()">
                                <a href="{{ route('upgrade', ['package' => 'Gold']) }}">
                                <div class="investment_box_wrapper package-box-wrapper gold-bg">
                                    <div class="investment_icon_wrapper package_icon_wrapper">
                                        <h1><i class="fa fa-crown dashboard-icon"></i>Gold</h1>
                                    </div>

                                    <div class="invest_details">
                                        <table class="invest_table">
                                            <tbody>
                                                <tr>
                                                    <td class="package-color1">Registration Fee</td>
                                                    <td class="package-color1"><span class="membership-fee amount">50,000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="package-color1">Monthly Activation</td>
                                                    <td class="package-color1"><span class="amount">10,000</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="package-color1">Starter Pack Bonus</td>
                                                    <td class="package-color1"><span class="amount">5,000</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="package-color1">Monthly Pack Bonus</td>
                                                    <td class="package-color1"><span class="amount">2,000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="package-color1">Earning Level</td>
                                                    <td class="package-color1">7 - 8</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            </a>
                        </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                            <div onclick="chooseNewMembershipLevel()">
                                <a href="{{ route('upgrade', ['package' => 'Diamond']) }}">
                                <div class="investment_box_wrapper package-box-wrapper diamond-bg">
                                    <div class="investment_icon_wrapper package_icon_wrapper">
                                        <h1><i class="fa fa-crown dashboard-icon"></i>Diamond</h1>
                                    </div>

                                    <div class="invest_details">
                                        <table class="invest_table">
                                            <tbody>
                                                <tr>
                                                    <td class="package-color1">Registration Fee</td>
                                                    <td class="package-color1"><span class="membership-fee amount">75,000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="package-color1">Monthly Activation</td>
                                                    <td class="package-color1"><span class="amount">10,000</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="package-color1">Starter Pack Bonus</td>
                                                    <td class="package-color1"><span class="amount">10,000</span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="package-color1">Monthly Pack Bonus</td>
                                                    <td class="package-color1"><span class="amount">2,000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="package-color1">Earning Level</td>
                                                    <td class="package-color1">9 - 10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </a>
                        </div>
                        </div>

                        @elseif(Auth::user()->package == 'Silver')
                        
                            <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                <div onclick="chooseNewMembershipLevel()">
                                    <a href="{{ route('upgrade', ['package' => 'Gold']) }}">
                                    <div class="investment_box_wrapper package-box-wrapper gold-bg">
                                        <div class="investment_icon_wrapper package_icon_wrapper">
                                            <h1><i class="fa fa-crown dashboard-icon"></i>Gold</h1>
                                        </div>

                                        <div class="invest_details">
                                            <table class="invest_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="package-color1">Registration Fee</td>
                                                        <td class="package-color1"><span class="membership-fee amount">25,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Monthly Activation</td>
                                                        <td class="package-color1"><span class="amount">10,000</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Starter Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">2,500</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Monthly Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">2,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Earning Level</td>
                                                        <td class="package-color1">7 - 8</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                </a>
                            </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                <div onclick="chooseNewMembershipLevel()">
                                    <a href="{{ route('upgrade', ['package' => 'Diamond']) }}">
                                    <div class="investment_box_wrapper package-box-wrapper diamond-bg">
                                        <div class="investment_icon_wrapper package_icon_wrapper">
                                            <h1><i class="fa fa-crown dashboard-icon"></i>Diamond</h1>
                                        </div>

                                        <div class="invest_details">
                                            <table class="invest_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="package-color1">Registration Fee</td>
                                                        <td class="package-color1"><span class="membership-fee amount">50,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Monthly Activation</td>
                                                        <td class="package-color1"><span class="amount">10,000</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Starter Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">7,500</span></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="package-color1">Monthly Pack Bonus</td>
                                                        <td class="package-color1"><span class="amount">2,000</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="package-color1">Earning Level</td>
                                                        <td class="package-color1">9 - 10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </a>
                            </div>
                            </div>

                            @else(Auth::user()->package == 'Gold')
                            
                                <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 col-12 package-box-container">
                                    <div onclick="chooseNewMembershipLevel()">
                                        <a href="{{ route('upgrade', ['package' => 'Diamond']) }}">
                                        <div class="investment_box_wrapper package-box-wrapper diamond-bg">
                                            <div class="investment_icon_wrapper package_icon_wrapper">
                                                <h1><i class="fa fa-crown dashboard-icon"></i>Diamond</h1>
                                            </div>

                                            <div class="invest_details">
                                                <table class="invest_table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="package-color1">Registration Fee</td>
                                                            <td class="package-color1"><span class="membership-fee amount">25,000</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="package-color1">Monthly Activation</td>
                                                            <td class="package-color1"><span class="amount">10,000</span></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="package-color1">Starter Pack Bonus</td>
                                                            <td class="package-color1"><span class="amount">5,000</span></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="package-color1">Monthly Pack Bonus</td>
                                                            <td class="package-color1"><span class="amount">2,000</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="package-color1">Earning Level</td>
                                                            <td class="package-color1">9 - 10</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </a>
                                </div>
                                </div>
                            @endif
                        
                    </div>
                </div>
        @endif
        <!--  account wrapper end -->

@endsection