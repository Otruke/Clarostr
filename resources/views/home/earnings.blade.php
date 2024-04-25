
@extends('userdashboard')

@section('content')
    <!-- Main section Start -->
    <div class="l-main">
        <!-- Earning wrapper start -->
        <div class="view_profile_wrapper_top float_left mt-175">

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="sv_heading_wraper">

                        <h3 class="dashboard-title">My Earnings - Available For Withdrawal</h3>

                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="view_profile_wrapper float_left mb-5">
                        <div class="userdescc">
                            <h4 class="dashboard-note font-700 text-color-orange">Gross Profit
                            </h4>
                            <p class="mt-2">This is your accumulated earnings from the day of sign up till present - <b> <br>(Non-Withdrawable)</b></p>
                        </div>
                        <div class="row">

                            <div class="crm_customer_table_main_wrapper float_left">
                                <div class="crm_ct_search_wrapper">
                                    <div class="crm_ct_search_bottom_cont_Wrapper">
                                    </div>
                                </div>
                                <div class="table-responsive gross-earning-table-div">
                                    
                                    <table id=""
                                        class="table cs-table crm_customer_table_inner_Wrapper mt-5">
                                        <tbody>
                                            
                                            <tr class="background_white">

                                                <td>Accumulated Earning Period</td>
                                                <td>
                                                    {{ Auth::user()->created_at->format('F d, Y') }} - Present
                                                </td>
                                            </tr>
                                            <!-- @foreach ($withdrawedEarnings as $category => $withdrawed)
                                            <tr class="background_white">

                                                <td>{{ $category }}</td>
                                                <td><span class="amount">{{ number_format($withdrawed, 2) }}</span></td>
                                            </tr>
                                            @endforeach -->
                                            @foreach ($grossEarnings as $category => $gross)
                                            <tr class="background_white">

                                                <td>{{ $category }}</td>
                                                <td><span class="amount">{{ number_format($gross, 2) }}</span></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="view_profile_wrapper float_left mb-5">
                        <div class="userdescc">
                            <h4 class="dashboard-note font-700 text-color-orange">Net Profit
                            </h4>
                            <p class="mt-2">Total earnings withdrawable</p>
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
                                            
                                            <tr class="background_white">

                                                <td>Earning Period</td>
                                                <td>Withdraw Now</td>
                                            </tr>
                                            @foreach ($netEarnings as $category => $net)
                                            <tr class="background_white">
                                                

                                            <td>{{ $category }}</td>
                                            <td><span class="amount">{{ number_format($net, 2) }}</span></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                    
                                        <form action="{{ route('transfer') }}" method="POST">
                                            @csrf
                                            @foreach($netEarnings as $category => $net)
                                                <input type="hidden" name="{{ $category }}" value="{{ $net }}">
                                            @endforeach
                                            <input type="hidden" id="accountname" name="account_name" value="{{Auth::user()->bank_account_name}}" placeholder="Account Name" />
                                            
                                            <!-- Generate unique reference number -->
                                            @php
                                                $uniqueReference = Auth::user()->username . '_' . now()->format('YmdHis') . '_' . Str::random(7);
                                            @endphp
                                            <input type="hidden" name="reference" value="{{ $uniqueReference }}" />

                                            <!-- Fetch user bank sort code -->
                                            @php
                                                $userBankName = auth()->user()->bank_name;
                                                $userBank = \App\Models\Bank::where('name', $userBankName)->first();
                                                $userBankSortCode = $userBank ? $userBank->sort_code : '';
                                            @endphp

                                            <input name="account_bank" type="hidden" value="{{ $userBankSortCode }}" placeholder="Bank Account"/>

                                            <input name="email" type="hidden" value="{{Auth::user()->email}}" placeholder="email"/>
                                            <input name="account_number" type="hidden" value="{{Auth::user()->bank_account_number}}" placeholder="account Number"/>
                                            <input type="hidden" name="currency" value="NGN" />
                                            
                                            <input type="hidden" name="narration" value="{{Auth::user()->first_name}} Withdrawal" />
                                            <input type="hidden" name="description" value="Wdrw"  />
                                            @if( Auth::user()->sub_status == 1 )
                                            <button type="submit"  class="dashboard-btn withdraw-btn">Withdraw Earnings</button>
                                            @else
                                            <a href="#" style="padding: 5;"  class="dashboard-btn withdraw-btn">Activate To Withdraw</a>
                                            @endif

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="mb-5">

                        <h5 class="withdrawal-history-btn"><a href="{{ route('withdrawalHistory') }}">Click to view withdrawal history</a></h5>

                    </div>
                </div>
            </div>

        </div>
        <!-- Earning wrapper end -->

        <!-- JavaScript to prevent default back button action -->
        <script>
            // Prevent default back button action
            window.onload = function () {
                if (window.history && window.history.pushState) {
                    window.history.pushState('forward', null, '');
                    window.onpopstate = function () {
                        window.location.replace("{{ route('home') }}"); 
                    };
                }
            }
        </script>

@endsection
