<?php

namespace App\Http\Controllers;
use App\Models\UserTransaction;
use App\Models\Earning;
use App\Models\User;
use App\Models\WithdrawalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bank;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieve transactions for the currently authenticated user
        $user = auth()->user();
        $userId = auth()->user()->id;
        $user->calculateEarnings();
        $transaction = UserTransaction::where('user_id', $userId)->first();
        $earnings = Earning::where('user_id', $userId)->first();
        $user = User::where('id', $userId)->firstOrFail();
        $descendants = $user->descendants()->with('allDescendants')->get();
        $descendantsCount = $descendants->count();
        
        $downliners = $user->getAllDownlinersExceptDirectReferrals();
        $downlinersCount = $downliners->count();
        return view('home', ['transaction' => $transaction , 'user' => auth()->user(), 'earnings' => $earnings, 'downlinersCount' => $downlinersCount]);
    }

    public function membership()
    {
        
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.membership', ['transaction' => $transaction]);
    }

    public function upline()
    {
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.upline', ['transaction' => $transaction , 'user' => auth()->user()]);
    }

    public function myReferral()
    {
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.myReferral', ['transaction' => $transaction , 'user' => auth()->user()]);
    }

    public function showEarnings()
    {
        $user = auth()->user();
        
        // Fetch the user's earnings record
        $earningsRecord = $user->earnings;
        $user->calculateEarnings();

        // Check if the earnings record exists
        if ($earningsRecord) {
            // You can directly access the earnings categories from the earnings record
            $starterEarnings = $earningsRecord->starter_earnings;
            $directReferralEarnings = $earningsRecord->direct_referral_earnings;
            $downlinersEarnings = $earningsRecord->downliners_earnings;
            $descendantsMonthlyEarnings = $earningsRecord->descendants_monthly_earnings;
            $monthlyEarnings = $earningsRecord->monthly_earnings;
            $totalEarnings = $earningsRecord->total_earnings;

            // Pass the earnings data to the view
            return view('home', [
                'starterEarnings' => $starterEarnings,
                'directReferralEarnings' => $directReferralEarnings,
                'downlinersEarnings' => $downlinersEarnings,
                'descendantsMonthlyEarnings' => $descendantsMonthlyEarnings,
                'monthlyEarnings' => $monthlyEarnings,
                'totalEarnings' => $totalEarnings,
            ]);
        } else {
           
            $user->earnings()->create([
                'starter_earnings' => 0,
                'direct_referral_earnings' => 0,
                'downliners_earnings' => 0,
                'descendants_monthly_earnings' => 0,
                'monthly_earnings' => 0,
                'total_earnings' => 0,
                
            ]);

            $user->calculateEarnings();

            return view('home', [
                'starterEarnings' => $starterEarnings,
                'directReferralEarnings' => $directReferralEarnings,
                'downlinersEarnings' => $downlinersEarnings,
                'descendantsMonthlyEarnings' => $descendantsMonthlyEarnings,
                'monthlyEarnings' => $monthlyEarnings,
                'totalEarnings' => $totalEarnings,
            ]);
        }
    }

    public function earnings()
    {
        $user = auth()->user();
    
        // Calculate both gross and net earnings
        $grossEarnings = $user->calculateGrossEarnings();
        $netEarnings = $user->calculateNetEarnings();
        $withdrawedEarnings = $user->calculateWithdrawedEarnings();
        
        return view('home.earnings', [
            'grossEarnings' => $grossEarnings,
            'netEarnings' => $netEarnings,
            'withdrawedEarnings' => $withdrawedEarnings,
        ]);
        
    }


    public function profile()
    {
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.profile', ['transaction' => $transaction , 'user' => auth()->user()]);
    }

    public function foodVest()
    {
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.foodVest', ['transaction' => $transaction , 'user' => auth()->user()]);
    }

    public function help()
    {
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.help', ['transaction' => $transaction , 'user' => auth()->user()]);
    }

    

    public function editPersonal(Request $request)
    {
        
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.editPersonal', ['transaction' => $transaction , 'user' => auth()->user()]);
    }


    public function editBank()
    {

        $banks = Bank::orderBy('name')->get(); // Retrieve banks sorted by name
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.editBank', ['banks'=> $banks, 'transaction' => $transaction , 'user' => auth()->user()]);
    }

    public function editPersonal2(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $updateData = [];

        // Check and update first_name if not empty
        if (!empty($request->input('first_name'))) {
            $updateData['first_name'] = $request->input('first_name');
        }

        // Check and update last_name if not empty
        if (!empty($request->input('last_name'))) {
            $updateData['last_name'] = $request->input('last_name');
        }

        // Check and update gender only if it's "Male" or "Female"
        $gender = $request->input('gender');
        if ($gender === "Male" || $gender === "Female") {
            $updateData['gender'] = $gender;
        }

        // Check and update address if not empty
        if (!empty($request->input('address'))) {
            $updateData['address'] = $request->input('address');
        }

        // Check and update state if not empty
        if (!empty($request->input('state'))) {
            $updateData['state'] = $request->input('state');
        }

        // Check and update country if not empty
        if (!empty($request->input('country'))) {
            $updateData['country'] = $request->input('country');
        }

        // Update user data with non-empty fields
        $user->update($updateData);

        return view('home.profile');
    }


    public function editBank2(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $user->update([
            'bank_name' => $request->input('bank_name'),
            'bank_account_name' => $request->input('bank_account_name'),
            'bank_account_number' => $request->input('bank_account_number'),
        ]);

        

        return view('home.profile');
    }

    public function withdrawalHistory()
    {
        // Fetch withdrawal transactions for the current user
        $user = auth()->id();
        $withdrawals = UserTransaction::where('user_id', $user)
            ->where('type', 'Wdrw')
            ->get();

        //dd($withdrawals);

        $withdrawalsCount = $withdrawals->count();

        return view('home.withdrawalHistory', compact('withdrawals', 'withdrawalsCount'));
    }

    public function showWithdrawalDetails($transaction_id)
    {
        // Retrieve user transaction details
        $transaction = UserTransaction::where('transaction_id', $transaction_id)->firstOrFail();

        // Retrieve withdrawal history details based on the transaction ID
        $withdrawalDetails = WithdrawalHistory::where('transaction_id', $transaction_id)->first();

        return view('home.withdrawalDetails', compact('transaction', 'withdrawalDetails'));
    }

}
