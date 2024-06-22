<?php

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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $banks = Bank::orderBy('name')->get(); // Retrieve banks sorted by name

        return view('auth.register', compact('banks'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    // This method is for the pre-launch that randomly place
    // new user into sponsors since i will disable the sponsor input field

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
            // Get all users
            $allUsers = User::all();

            // Filter users who have not exceeded their direct downlines limit
            $potentialSponsors = $allUsers->filter(function ($potentialSponsor) use ($user) {
                $maxDirectDownlines = $this->getMaxDirectDownlines($potentialSponsor->package);
                return $potentialSponsor->direct_downlines_count < $maxDirectDownlines && $potentialSponsor->id !== $user->id;
            });

            if ($potentialSponsors->isNotEmpty()) {
                // Randomly select a sponsor from the potential sponsors
                $sponsor = $potentialSponsors->random();
            } else {
                // Default to "first" if no valid sponsor found
                $sponsor = User::where('username', 'first')->first();
            }
        }

        if ($sponsor && $sponsor->id !== $user->id) {
            // Check if the user has reached the maximum allowed direct downlines based on the package
            $maxDirectDownlines = $this->getMaxDirectDownlines($sponsor->package);

            if ($sponsor->direct_downlines_count < $maxDirectDownlines) {
                // Set the parent relationship for the current user using nested set methods
                $user->appendToNode($sponsor)->save();

                // Set the sponsor for the user
                $user->sponsor = $sponsor->username;
                $user->save();

                // Increment direct downlines count for the sponsor
                $sponsor->increment('direct_downlines_count');

                // Calculate and set the level for the sponsor
                $sponsor->level = $sponsor->getLevel();
                $sponsor->save();
            } else {
                // Sponsor has reached the limit, register overflow under "first"
                $firstSponsor = User::where('username', 'first')->first();

                if ($firstSponsor && $firstSponsor->id !== $user->id) {
                    // Set the parent relationship for the current user using nested set methods
                    $user->appendToNode($firstSponsor)->save();

                    // Set the sponsor for the user
                    $user->sponsor = $firstSponsor->username;
                    $user->save();

                    // Increment direct downlines count for "first"
                    $firstSponsor->increment('direct_downlines_count');

                    // Calculate and set the level for "first"
                    $firstSponsor->level = $firstSponsor->getLevel();
                    $firstSponsor->save();
                }
            }
        } else {
            // Handle the case where no valid sponsor is found or sponsor is the same as the user
            // You can choose to throw an error, log this event, or handle it gracefully as needed
            Log::error('No valid sponsor found or sponsor is the same as the user', ['user' => $user->username]);
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

        return $maxDirectDownlines[$package] ?? 0; // Return 0 if the package is not defined
    }



}



    // This Method below is the default method that create users details and 
    // check if they didnt input sponsor name. If they did not input sponsor name,
    // it register them under first or if they exceed their limit, it still register them under first

//     protected function create(array $data)
//     {
//         // Check if the sponsor field is empty, and set it to "first" if it is
//         $sponsor = empty($data['sponsor']) ? 'first' : $data['sponsor'];
//         $user = User::create([
//             'username' => $data['username'],
//             'first_name' => $data['first_name'],
//             'middle_name' => $data['middle_name'],
//             'last_name' => $data['last_name'],
//             'email' => $data['email'],
//             'phone_number' => $data['phone_number'],
//             'gender' => $data['gender'],
//             'sponsor' => $sponsor, // Set sponsor to "first" if empty or null
//             'package' => $data['package'],
//             'amount' => $data['amount'],
//             'password' => Hash::make($data['password']),
//             'bank_name' => $data['bank_name'],
//             'bank_account_name' => $data['bank_account_name'],
//             'bank_account_number' => $data['bank_account_number'],
//             'address' => $data['address'],
//             'state' => $data['state'],
//             'country' => $data['country'],
//         ]);

//         // Generate and save referral link
//         $user->referral_link = route('referral.link', ['username' => $data['username']]);

//         // Initialize earned_downliner_ids and monthly_earned_downliner_ids as empty arrays
//         $user->earned_downliner_ids = [];
//         $user->monthly_earned_downliner_ids = [];
//         $user->save();

//         // Create an earning record for the user
//         $user->earnings()->create([
//             'starter_earnings' => 0,
//             'direct_referral_earnings' => 0,
//             'downliners_earnings' => 0,
//             'descendants_monthly_earnings' => 0,
//             'monthly_earnings' => 0,
//             'food_invest_earnings' => 0,
//             'total_earnings' => 0,
//          ]);

//         // Implement MLM logic
//         //$this->handleMLM($user);

        
//         $user->calculateEarnings();
//         return $user;
//     }

    


   
//    protected function redirectTo()
//     {
        
//         return route('regpayment');
//     }

//     protected function handleMLM(User $user)
//     {
//         $sponsor = User::where('username', $user->sponsor)->first();

//         if ($sponsor) {
//             // Check if the user has reached the maximum allowed direct downlines based on the package
//             $maxDirectDownlines = $this->getMaxDirectDownlines($user->package);

//             if ($sponsor->direct_downlines_count < $maxDirectDownlines) {
//                 // Set the parent relationship for the current user using nested set methods
//                 $user->appendToNode($sponsor)->save();

//                 // Increment direct downlines count for the sponsor
//                 $sponsor->increment('direct_downlines_count');

//                 // Calculate and set the level for the sponsor
//                 $sponsor->level = $sponsor->getLevel();
//                 $sponsor->save();
//             } else {
//                 // Sponsor has reached the limit, register overflow under "first"
//                 $firstSponsor = User::where('username', 'first')->first();

//                 if ($firstSponsor) {
//                     // Set the parent relationship for the current user using nested set methods
//                     $user->appendToNode($firstSponsor)->save();

//                     // Increment direct downlines count for "first"
//                     $firstSponsor->increment('direct_downlines_count');

//                     // Calculate and set the level for "first"
//                     $firstSponsor->level = $firstSponsor->getLevel();
//                     $firstSponsor->save();
//                 } 
//                 // else {
//                 //     // Handle the case where "first" does not exist (create "first" user, etc.)
//                 // }
//             }
//         }
//     }

//     protected function getMaxDirectDownlines($package)
//     {
//         // Define the maximum allowed direct downlines for each package
//         $maxDirectDownlines = [
//             'Starter' => 4,
//             'Bronze' => 8,
//             'Silver' => 16,
//             'Gold' => 32,
//             'Diamond' => PHP_INT_MAX, // Unlimited for Diamond
//         ];

//         // Return the maximum allowed direct downlines based on the user's package
//         return $maxDirectDownlines[$package];
//     }

    

// }



        