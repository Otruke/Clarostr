<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTransaction;
use App\Models\WithdrawalHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Flutterwave\Rave\Facades\Rave as Flutterwave;

class WithdrawalController extends Controller
{   
    public function withdrawal(){
        return view('home.withdraw');
    }
    public function initialize(Request $request) {
        // Store form data in session
        $request->session()->put('withdrawalRequestData', $request->all());
        $withdrawalRequestInfo = $request->session()->get('withdrawalRequestData');
        dd($withdrawalRequestInfo);
        
         $arrdata = [
            'account_bank' => $request->bank_name,
            'account_number' => $request->account_number,
            'amount' => $request->amount,
            'narration' => 'Withdrawal from MyApp',
            'currency' => 'NGN', // Adjust currency as needed
            'beneficiary_name' => $request->account_name,
            'seckey' => config('rave.secretKey'),
        ];
        
      //This initializes payment and redirects to the payment gateway
      //The initialize method takes the parameter of the redirect URL
      $transfer = Flutterwave::initiateTransfer($arrdata);  
      dd($transfer);
      // Check if transfer initiation was successful
      if ($transfer['status'] === 'success') {
        // Update user's table
        $user = Auth::user();
        $myId = $user->id;

        // $withdrawalRequestInfo = $request->session()->get('withdrawalRequestData');
        dd($withdrawalRequestInfo);

        $transaction_id = $withdrawalRequestInfo['reference'];
        $starter_earnings = $withdrawalRequestInfo['Starter_Pack'];
        $direct_referral_earnings = $withdrawalRequestInfo['Direct_Affiliate_Income'];
        $downliners_earnings = $withdrawalRequestInfo['Activation_Income_On_Downliners'];
        $descendants_monthly_earnings = $withdrawalRequestInfo['Earn_For_Life_Income'];
        $monthly_earnings = $withdrawalRequestInfo['Monthly_Pack_Bonus'];
        $food_invest_earnings = $withdrawalRequestInfo['Food_Invest_Earnings'];
        $total_earnings = $withdrawalRequestInfo['Total'];
        $description = $withdrawalRequestInfo['description'];

        function findData($data, $key)
        {
            if (isset($data[$key])) {
                return $data[$key];
            }
        
            foreach ($data as $value) {
                if (is_array($value)) {
                    $result = findData($value, $key);
                    if ($result) {
                        return $result;
                    }
                }
            }
        
            return null;
        }

        $txRef = findData($data, 'txRef');
        $customerEmail = findData($data, 'email');
        $customerName = findData($data, 'fullName');
        $chargeResponsecode = findData($data, 'responsecode');
        $chargeCurrency = findData($data, 'currency');
        $Amount = findData($data, 'amount');
        $customerPaymentType = findData($data, 'paymentType');
        $Description = findData($data, 'description');
        if (empty($paymentDescription)) {
            $paymentDescription = $Description2;
            
        }

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

      //if ($transfer['status'] !== 'success') {
          return view('home.membership');
      }
    else {
      // Notify the user that something went wrong
      return view('home.membership', ['message' => $transfer['message']]);
    }
  
  }
}