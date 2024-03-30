<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoughController extends Controller
{
    //RegisterController

    protected function handleMLM(User $user)
    {
        // Set sponsor for the current user
        $sponsor = User::where('username', $user->sponsor)->first();

        // Check if the sponsor is valid
        if ($sponsor) {
            // Attach the user as a direct referral to the sponsor
            $sponsor->directReferrals()->save($user);

            // Increment direct downlines count for the sponsor
            $sponsor->increment('direct_downlines_count');

            // Check for overflow referrals
            if ($sponsor->hasOverflowReferrals()) {
                // Distribute overflow referrals uniformly
                $this->distributeOverflowReferrals($sponsor);
            }

            // Calculate and set the level for the sponsor
            $sponsor->level = $sponsor->getLevel();
            $sponsor->save();

            // // Calculate and set the level for the current user
            // $user->level = $user->getLevel();
            // $user->save();
        }
    }

    protected function distributeOverflowReferrals(User $sponsor)
    {
        // Check if the user has completed four direct downlines
        if ($sponsor->direct_downlines_count >= 4 && !$sponsor->overflow_distribution_complete) {
            // Get all the descendants (generation downlines) of the user
            $descendants = $sponsor->allDescendants;

            // Calculate the number of descendants who have not completed four direct downlines
            $eligibleDescendants = $descendants->filter(function ($descendant) {
                return $descendant->direct_downlines_count < 4;
            });

            // Get the number of overflow referrals to distribute
            $overflowReferralsCount = $sponsor->direct_downlines_count - 4;

            // Retrieve the overflow referrals for the user
            $overflowReferrals = factory(User::class, $overflowReferralsCount)->make();

            // Loop through eligible descendants and distribute overflow referrals
            foreach ($eligibleDescendants as $descendant) {
                // Determine the number of overflow referrals to assign to the current descendant
                $overflowToAssign = min(1, $overflowReferralsCount);

                // Assign the overflow referrals to the descendant
                $descendant->directReferrals()->saveMany($overflowReferrals->splice(0, $overflowToAssign));

                // Increment the direct downlines count for the descendant
                $descendant->increment('direct_downlines_count', $overflowToAssign);

                // Update the overflow referrals count
                $overflowReferralsCount -= $overflowToAssign;
            }

            // Mark overflow distribution as complete
            $sponsor->update(['overflow_distribution_complete' => true]);
        }
    }

    
}
