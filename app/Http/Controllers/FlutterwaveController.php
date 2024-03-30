<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTransaction;
use App\Models\WithdrawalHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Flutterwave\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{   
    public function initialize(Request $request) {
        // Store form data in session
        $request->session()->put('paymentFormData', $request->all());
        
      //This initializes payment and redirects to the payment gateway
      //The initialize method takes the parameter of the redirect URL
      Flutterwave::initialize(route('callback'));  
    }

    public function callback(Request $request) {
        // This verifies the transaction and takes the parameter of the transaction reference

        $data = json_decode($request->resp, true);
        
        $formData = $request->session()->get('paymentFormData');
        // dd($formData);
        // Below is the retrieved data structure while testing, all where filled with right values which i will delete here,
        // the token returned a long random alphanumeric string
        // array:10 [▼
        //   "_token" => ""
        //   "firstname" => ""
        //   "lastname" => ""
        //   "country" => ""
        //   "email" => ""
        //   "phonenumber" => ""
        //   "currency" => ""
        //   "amount" => ""
        //   "payment_method" => ""
        //   "description" => ""
        // ]

        // Extract required form fields
        $Description2 = $formData['description'];
        $Amount2 = $formData['amount'];
        

        //dd($data);

        //$data = Flutterwave::verifyTransaction($data['tx']['txRef']);
        // $txRef = $data['data']['data']['tx']['txRef'];
   
        // $customerPaymentType = $data['data']['data']['tx']['paymentType'];
        
    //rufus inputed method for dynamic array location of call back received data
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
        $chargeAmount = findData($data, 'amount');
        $customerPaymentType = findData($data, 'paymentType');
        $paymentDescription = findData($data, 'description');
        if (empty($paymentDescription)) {
            $paymentDescription = $Description2;
            
        }
        
        
        
                
                //dd($txRef, $customerEmail, $customerName, $chargeResponsecode, $chargeCurrency, $chargeAmount, $customerPaymentType );



        //code from library
        // $chargeResponsecode = $data->data->chargecode;
        // $chargeAmount = $data->data->amount;
        // $chargeCurrency = $data->data->currency;
    
        
        //$amount = 500;
        //$currency = "NGN";
    
        //if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        //Give Value and return to Success page
        $user = Auth::user();
        $myId= $user->id;
   
        // Check if the transaction was successful
        if (($chargeAmount == $Amount2) && ($chargeCurrency == "NGN")) {
        //if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeCurrency == "NGN")) {
            // Get the authenticated user (using Laravel Auth)
            $user = Auth::user();
            $userCurrentAmount = $user->amount;
            $Amount = ($userCurrentAmount + $chargeAmount);

            $allowedPackages = ['Bronze', 'Silver', 'Gold', 'Diamond'];

            if (in_array($paymentDescription, $allowedPackages)) {
                // 1. Update the user table
                $user->update([
                    'package' => $paymentDescription,
                    'amount' => intval($Amount),
                    'unsubscribed_days' => 0,
                    'last_payment_date' => Carbon::now(),
                    'next_billing' => now()->addMonth(),
                    'sub_status' => true,
                ]);

                // 2. Populate the User transactions table
                UserTransaction::create([
                'user_id' => $myId,
                'transaction_id' => $txRef,
                'amount' => $chargeAmount,
                'name' => $user->username,
                'email' => $customerEmail,
                'phone_number' => $user->phone_number,
                'payment_mode' => $customerPaymentType,
                'description' => 'Upgrade to ' . $paymentDescription,
                'type' => 'Dpst',
                
                ]);

                // Additional logic if needed
            } else {
                $user->update([
                'is_subscribed' => true,
                'unsubscribed_days' => 0,
                'last_payment_date' => Carbon::now(),
                'next_billing' => now()->addMonth(),
                'sub_status' => true,
                ]);

                // 2. Populate the User transactions table
                UserTransaction::create([
                'user_id' => $myId,
                'transaction_id' => $txRef,
                'amount' => $chargeAmount,
                'name' => $user->username,
                'email' => $customerEmail,
                'phone_number' => $user->phone_number,
                'payment_mode' => $customerPaymentType,
                'description' => 'Payment for ' . $paymentDescription,
                'type' => 'Dpst',
                
                ]);
            }
        
            return redirect('/home');
        
        } else {
            return redirect('/home');
        }
    
        // dd($data->data);
    }

}
