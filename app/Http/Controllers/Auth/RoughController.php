namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Bank;
use App\Models\WithdrawalHistory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $banks = Bank::orderBy('name')->get();
        return view('auth.register', compact('banks'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'first_name' => ['required', 'string', 'max:50'],
            'middle_name' => ['nullable', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'min:11', 'max:15', 'unique:users'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'sponsor' => ['nullable', 'string', 'max:50', 'exists:users,username'],
            'package' => ['required', 'string', Rule::in(['Starter', 'Bronze', 'Silver', 'Gold', 'Diamond'])],
            'amount' => ['required', 'integer', Rule::in(['12500', '25000', '50000', '75000', '100000'])],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/', 'confirmed'],
            'bank_name' => ['required', 'string', 'max:200'],
            'bank_account_name' => ['required', 'string', 'max:200'],
            'bank_account_number' => ['required', 'string', 'min:10', 'max:12'],
            'address' => ['required', 'string', 'max:220'],
            'state' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'sponsor' => $data['sponsor'] ?? null, // Set sponsor to null if not provided
            'package' => $data['package'],
            'amount' => $data['amount'],
            'password' => Hash::make($data['password']),
            'bank_name' => $data['bank_name'],
            'bank_account_name' => $data['bank_account_name'],
            'bank_account_number' => $data['bank_account_number'],
            'address' => $data['address'],
            'state' => $data['state'],
            'country' => $data['country'],
        ]);

        // Generate and save referral link
        $user->referral_link = route('referral.link', ['username' => $data['username']]);

        // Initialize earned_downliner_ids and monthly_earned_downliner_ids as empty arrays
        $user->earned_downliner_ids = [];
        $user->monthly_earned_downliner_ids = [];
        $user->save();

        // Create an earning record for the user
        $user->earnings()->create([
            'starter_earnings' => 0,
            'direct_referral_earnings' => 0,
            'downliners_earnings' => 0,
            'descendants_monthly_earnings' => 0,
            'monthly_earnings' => 0,
            'food_invest_earnings' => 0,
            'total_earnings' => 0,
        ]);

        // Implement MLM logic
        $this->handleMLM($user);

        $user->calculateEarnings();
        return $user;
    }

    protected function redirectTo()
    {
        return route('regpayment');
    }

    protected function handleMLM(User $user)
    {
        // If the sponsor is not provided or is invalid, find a random valid sponsor
        if (empty($user->sponsor) || !$sponsor = User::where('username', $user->sponsor)->first()) {
            // Find all users who have not exceeded their direct downlines limit
            $potentialSponsors = User::whereHas('package', function ($query) {
                $query->whereRaw('direct_downlines_count < max_direct_downlines');
            })->get();

            if ($potentialSponsors->isNotEmpty()) {
                // Randomly select a sponsor from the potential sponsors
                $sponsor = $potentialSponsors->random();
            } else {
                // Default to "first" if no valid sponsor found
                $sponsor = User::where('username', 'first')->first();
            }
        }

        if ($sponsor) {
            // Check if the user has reached the maximum allowed direct downlines based on the package
            $maxDirectDownlines = $this->getMaxDirectDownlines($sponsor->package);

            if ($sponsor->direct_downlines_count < $maxDirectDownlines) {
                // Set the parent relationship for the current user using nested set methods
                $user->appendToNode($sponsor)->save();

                // Increment direct downlines count for the sponsor
                $sponsor->increment('direct_downlines_count');

                // Calculate and set the level for the sponsor
                $sponsor->level = $sponsor->getLevel();
                $sponsor->save();
            } else {
                // Sponsor has reached the limit, register overflow under "first"
                $firstSponsor = User::where('username', 'first')->first();

                if ($firstSponsor) {
                    // Set the parent relationship for the current user using nested set methods
                    $user->appendToNode($firstSponsor)->save();

                    // Increment direct downlines count for "first"
                    $firstSponsor->increment('direct_downlines_count');

                    // Calculate and set the level for "first"
                    $firstSponsor->level = $firstSponsor->getLevel();
                    $firstSponsor->save();
                }
            }
        }
    }

    protected function getMaxDirectDownlines($package)
    {
        // Define the maximum allowed direct downlines for each package
        $maxDirectDownlines = [
            'Starter' => 4,
            'Bronze' => 8,
            'Silver' => 16,
            'Gold' => 32,
            'Diamond' => PHP_INT_MAX, // Unlimited for Diamond
        ];

        // Return the maximum allowed direct downlines based on the user's package
        return $maxDirectDownlines[$package];
    }
}




<!-- rough for date time in withdrawalDetails view -->

<?php
                                                        $created = new DateTime($withdrawalDetails->created_at);
                                                        echo $created->format('F d, Y. H:i:s');
                                                    ?>



<!-- WITHDRAWAL CONTROLLER AS IT 22 JUNE 24 -->


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTransaction;
use App\Models\WithdrawalHistory;
use App\Models\Earning;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Flutterwave\Rave\Facades\Rave as Flutterwave;

class WithdrawalController extends Controller
{   
    public function withdrawal(){
        return view('home.withdraw');
    }
    public function belowLimit(){
      return view('home.belowLimit');
    }
    public function successfulWithdrawal(){
      $user = auth()->user();

      $user = User::find(auth()->id());


      return view('home.successfulWithdrawal', compact('user'));
    }
    public function initialize(Request $request) {
      $user = auth()->user();
      $checkStatus = $user->sub_status;
        
        // Store form data in session
        $request->session()->put('withdrawalRequestData', $request->all());
        $withdrawalRequestInfo = $request->session()->get('withdrawalRequestData');
        //dd($withdrawalRequestInfo);
        $getAmount = $withdrawalRequestInfo['Total'];
        //dd($getAmount);
         $arrdata = [
            'account_bank' => $request->bank_name,
            'account_number' => $request->account_number,
            'amount' => $withdrawalRequestInfo['Total'],
            'narration' => 'Withdrawal from MyApp',
            'currency' => 'NGN', // Adjust currency as needed
            'beneficiary_name' => $request->account_name,
            'seckey' => config('rave.secretKey'),
        ];
        if($checkStatus == 1 ){
          return redirect('/home');
        }
        elseif($getAmount <= 2500){
          return redirect('/help');
        }else{
            //This initializes payment and redirects to the payment gateway
            //The initialize method takes the parameter of the redirect URL
            $transfer = (array)Flutterwave::initiateTransfer($arrdata);  
            //dd($transfer);
            // Check if transfer initiation was successful
            if ($transfer['status'] === 'success') {
              // Update user's table
              $user = Auth::user();
              $myId = $user->id;

              // $withdrawalRequestInfo = $request->session()->get('withdrawalRequestData');
              //dd($withdrawalRequestInfo);

              $transaction_id = $withdrawalRequestInfo['reference'];
              $starter_earnings = $withdrawalRequestInfo['Starter_Pack'];
              $direct_referral_earnings = $withdrawalRequestInfo['Direct_Affiliate_Income'];
              $downliners_earnings = $withdrawalRequestInfo['Activation_Income_On_Downliners'];
              $descendants_monthly_earnings = $withdrawalRequestInfo['Earn_For_Life_Income'];
              $monthly_earnings = $withdrawalRequestInfo['Monthly_Pack_Bonus'];
              $food_invest_earnings = $withdrawalRequestInfo['Food_Invest_Earnings'];
              $total_earnings = $withdrawalRequestInfo['Total'];
              $description = $withdrawalRequestInfo['description'];

              

              //1. Populate the User transactions table
              UserTransaction::create([
              'user_id' => $myId,
              'transaction_id' => $transaction_id,
              'amount' => $total_earnings,
              'name' => $user->username,
              'email' => $user->email,
              'phone_number' => $user->phone_number,
              'payment_mode' => 'Transfer',
              'description' => 'Withdrawal ' . $Description,
              'type' => 'Wdrw',
              
              ]);
              //2. Populate the Withdrawal Histories table
              WithdrawalHistory::create([
                'user_id' => $myId,
                'transaction_id' => $transaction_id,
                'starter_earnings' => $starter_earnings,
                'direct_referral_earnings' => $direct_referral_earnings,
                'downliners_earnings' => $downliners_earnings,
                'descendants_monthly_earnings' => $descendants_monthly_earnings,
                'monthly_earnings' => $monthly_earnings,
                'food_invest_earnings' => $food_invest_earnings,
                'total_earnings' => $total_earnings,
                
                ]);

            
                return redirect('/successfulWithdrawal');
            }
            else {
              // Notify the user that something went wrong
              return view('home.membership', ['message' => $transfer['message']]);
            }
        }
  
    }

}


// EARNINGS BLADE CODE AS AT SAME DATE ABOVE


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

////////////////////////////////////////
///////////////////////////////////////