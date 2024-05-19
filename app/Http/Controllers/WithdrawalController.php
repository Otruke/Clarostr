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

