<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function redirectToWelcome($username)
    {
        // Redirect to the landing page with the username
        return redirect()->route('welcome')->with('referralUsername', $username);
    }

    public function showReferrals($username)
    {
        $user = auth()->user(); // Get the currently authenticated user
        $user = User::where('username', $username)->first();

        // Find all users where the current user is the sponsor
        $directReferrals = User::where('sponsor', $user->username)->get();
        $activeReferrals = User::where('sponsor', $user->username)->where('sub_status', true)->get();
        $TotalActiveReferrals = $activeReferrals->count();
        $totalReferrals = $directReferrals->count();

        return view('referrals.showdirect', compact('user', 'directReferrals', 'totalReferrals', 'TotalActiveReferrals'));
    }

    public function allDownliners($username)
    {
        $user = auth()->user();
        $user = User::where('username', $username)->firstOrFail();
        $directDownliners = $user->directReferrals;
    
        $downliners = collect();
    
        // Recursively fetch all downliners of each direct downliner
        foreach ($directDownliners as $directDownliner) {
            $downliners = $downliners->merge($this->getAllDownliners($directDownliner));
    }
    

    $descendantsCount = $downliners->count();

    // Check if there are any downliners before attempting to filter
    if ($descendantsCount > 0) {
        $activeDescendants = $downliners->where('sub_status', true);
        $activeDescendantsCount = $activeDescendants->count();
    } else {
        $activeDescendants = collect(); // Empty collection
        $activeDescendantsCount = 0;
    }

    return view('referrals.allDownliners', compact('user', 'descendantsCount', 'activeDescendantsCount', 'downliners'));
    }
    
    /**
     * Recursively fetch all downliners of a user.
     *
     * @param User $user
     * @return \Illuminate\Support\Collection
     */
    private function getAllDownliners($user)
    {
        $downliners = collect([$user]);
    
        foreach ($user->directReferrals as $directDownliner) {
            $downliners = $downliners->merge($this->getAllDownliners($directDownliner));
        }
    
        return $downliners;
    }

    
    public function showDownliners($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        
        // Get all descendants of the user
        $descendants = $user->descendants()->with('allDescendants')->get();
        
        // Filter out the direct referrals/downliners from the list of descendants
        $downliners = collect();
        foreach ($descendants as $descendant) {
            if (!$user->directReferrals->contains('id', $descendant->id)) {
                $downliners->push($descendant);
            }
        }
    
        $descendantsCount = $downliners->count();
        
        // Check if there are any descendants before attempting to filter
        if ($descendantsCount > 0) {
            $activeDescendants = $downliners->where('sub_status', true);
            $activeDescendantsCount = $activeDescendants->count();
        } else {
            $activeDescendants = collect(); // Empty collection
            $activeDescendantsCount = 0;
        }
    
        return view('referrals.downliners', compact('user', 'descendantsCount', 'activeDescendantsCount', 'downliners'));
    }


    
    public function showGenerationTree($username)
    {
        // // Find the user based on the provided username
        // $user = User::where('username', $username)->first();

        // // Check if the user exists
        // if (!$user) {
        //     abort(404); // Handle case where the user is not found
        // }

        // // Get all descendants (generation downlines) of the user
        // $descendants = $user->allDescendants;
        
        // //dd($descendants);
        
        $user = User::where('username', $username)->firstOrFail();
        $descendants = $user->descendants()->with('allDescendants')->get();

        // Pass the user and descendants to the view
        return view('referrals.generationTree', compact('user', 'descendants'));
        
        // $user = User::with(['directReferrals', 'allDescendants'])->where('username', $username)->firstOrFail();

        // return view('referrals.generationTree', compact('user'));
    }

}