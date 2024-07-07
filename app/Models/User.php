<?php

namespace App\Models;

use App\Models\Earning;
use App\Models\WithdrawalHistory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, NodeTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'username',
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'phone_number',
            'referral_link',
            'direct_downlines_count',
            'gender',
            'sponsor',
            'package',
            'amount',
            'password',
            'bank_name',
            'bank_account_name',
            'bank_account_number',
            'address',
            'state',
            'country',
            'is_subscribed',
            'sub_status',
            'three_month_sub',
            'last_payment_date',
            'next_billing',
            'overflow_distributed',
            'role',
            'unsubscribed_days',
            'earned_downliner_ids',
            'monthly_earned_downliner_ids',
            
            'level'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_monthly_earnings_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'earned_downliner_ids' => 'array',
        'monthly_earned_downliner_ids' => 'array',
    ];

    public function earnings()
    {
        return $this->hasOne(Earning::class);
    }

    public function withdrawalHistory(){
        return $this->hasOne(WithdrawalHistory::class);
    }


    public function sponsorUser()
    {
        return $this->belongsTo(User::class, 'sponsor', 'username');
    }

    public function directReferrals(): HasMany
    {
        return $this->hasMany(User::class, 'sponsor', 'username');
    }

    public function hasReachedMaxDirectDownlines()
    {
        return $this->directReferrals()->count() >= 4;
    }

    public function hasOverflowReferrals()
    {
        return $this->directReferrals()->count() > 4;
    }

    

    public function parentGeneration()
    {
        return $this->belongsTo(User::class, 'sponsor', 'username');
    }

    public function allGenerations()
    {
        return $this->hasMany(User::class, 'sponsor', 'username')->with('allGenerations');
    }

    public function isOverflowDistributionComplete()
    {
        // Check if the overflow referrals are already distribute
        return $this->overflow_distributed;
    }

    public function allDescendants(): HasMany
    {
        return $this->hasMany(User::class, 'sponsor', 'username')->with('allDescendants');
    }

    public function getAllDownlinersExceptDirectReferrals()
{
    // Retrieve all descendants (downlines) of the user
    $allDescendants = $this->descendants()->get();

    // Retrieve direct referrals of the user
    $directReferrals = $this->directReferrals()->get();

    // Filter out direct referrals from all descendants
    $downliners = $allDescendants->reject(function ($downliner) use ($directReferrals) {
        return $directReferrals->contains('id', $downliner->id);
    });

    return $downliners;
}



    public function distributeOverflowReferrals()
    {
        // Check if the user has completed four direct downlines
        if ($this->direct_downlines_count >= 4 && !$this->overflow_distribution_complete) {
            // Get all the descendants (generation downlines) of the user
            $descendants = $this->allDescendants;

            // Calculate the number of descendants who have not completed four direct downlines
            $eligibleDescendants = $descendants->filter(function ($descendant) {
                return $descendant->direct_downlines_count < 4;
            });

            // Calculate the number of overflow referrals to distribute
            $overflowReferralsCount = $this->direct_downlines_count - 4;

            // Distribute overflow referrals uniformly among eligible descendants
            $eligibleDescendants->each(function ($descendant) use (&$overflowReferralsCount) {
                // Determine the number of overflow referrals to assign to the current descendant
                $overflowToAssign = min(1, $overflowReferralsCount);

                // Assign the overflow referrals to the descendant
                $descendant->directReferrals()->saveMany(factory(User::class, $overflowToAssign)->make());

                // Increment the direct downlines count for the descendant
                $descendant->increment('direct_downlines_count', $overflowToAssign);

                // Update the overflow referrals count
                $overflowReferralsCount -= $overflowToAssign;
            });

            // Mark overflow distribution as complete
            $this->update(['overflow_distribution_complete' => true]);
        }
    }

    

    public function getLevel()
    {
        $totalGenerations = $this->allDescendants()->count();

        if ($totalGenerations >= 4 && $totalGenerations < 16) {
            return 2;
        } elseif ($totalGenerations >= 16 && $totalGenerations < 64) {
            return 3;
        } elseif ($totalGenerations >= 64 && $totalGenerations < 256) {
            return 4;
        } elseif ($totalGenerations >= 256 && $totalGenerations < 1024) {
            return 5;
        } elseif ($totalGenerations >= 1024 && $totalGenerations < 4096) {
            return 6;
        } elseif ($totalGenerations >= 4096 && $totalGenerations < 16384) {
            return 7;
        } elseif ($totalGenerations >= 16384 && $totalGenerations < 65536) {
            return 8;
        } elseif ($totalGenerations >= 65536 && $totalGenerations < 262144) {
            return 9;
        } elseif ($totalGenerations >= 262144 && $totalGenerations < 1048576) {
            return 10;
        }

        // Default to level 1
        return 1;
    }


        public function getStarterEarnings()
        {
            if ($this->is_subscribed) {
                switch ($this->package) {
                    case 'Starter':
                        return 2500;
                    case 'Bronze':
                        return 5000;
                    case 'Silver':
                        return 7500;
                    case 'Gold':
                        return 10000;
                    case 'Diamond':
                        return 15000;
                    default:
                        return 0;
                }
            }

            return 0; // User is not subscribed
        }


        public function getDirectReferralEarnings()
        {
            $earning = 0;

            foreach ($this->directReferrals as $referral) {
                if ($referral->is_subscribed) {
                    switch ($referral->package) {
                        case 'Starter':
                            $earning += 5000;
                            break;
                        case 'Bronze':
                            $earning += 10000;
                            break;
                        case 'Silver':
                            $earning += 20000;
                            break;
                        case 'Gold':
                            $earning += 30000;
                            break;
                        case 'Diamond':
                            $earning += 40000;
                            break;
                    }
                }
            }

            return $earning;
        }
        
        // public function calculateDownlinersEarnings()
        // {
        //     // Get the user's direct downlines
        //     $allDownlines = $this->allDescendants()->where('is_subscribed', true)->get();

        //     // Retrieve the IDs of downliners from whom the user has previously earned
        //     $earnedDownlinerIds = $this->earned_downliner_ids ?? [];

        //     // Calculate the package limit based on the user's package
        //     $packageLimit = [
        //         'Starter' => 16,
        //         'Bronze' => 256,
        //         'Silver' => 4096,
        //         'Gold' => 65536,
        //         'Diamond' => -1, // Unlimited
        //     ];

        //     // Calculate earnings from each eligible downline
        //     $totalEarnings = 0;
        //     foreach ($allDownlines as $downline) {
        //         // Check if the downline is not previously earned and within the package limit
        //         if (!in_array($downline->id, $earnedDownlinerIds) && 
        //             ($packageLimit[$this->package] == -1 || count($earnedDownlinerIds) < $packageLimit[$this->package])) {
        //             // Add earnings from this downline
        //             $totalEarnings += 1000;

        //             // Store the downliner's ID in the list of earned downliners
        //             $earnedDownlinerIds[] = $downline->id;
        //         }
        //     }

        //     // Update the user's earned downliner IDs
        //     $this->update(['earned_downliner_ids' => $earnedDownlinerIds]);

        //     return $totalEarnings;
        // }
        
        
        // public function calculateDownlinersEarnings()
        // {
        //     $Earnings = 0;
        //     // Get all downliners except direct referrals
        //     $downliners = $this->getAllDownlinersExceptDirectReferrals();

        //     // Retrieve the IDs of downliners from whom the user has previously earned
        //     $earnedDownlinerIds = $this->earned_downliner_ids ?? [];
        
        //     // Calculate earnings from each eligible downliner
        
            
        //     foreach ($downliners as $downliner) {
           
        //         // Check if the downliner is not previously earned and within the package limit
        //         if (!in_array($downliner->id, $earnedDownlinerIds) &&
        //             $this->isWithinPackageLimit(count($earnedDownlinerIds)) && $downliner->is_subscribed) {
        //             // Add earnings from this downliner
        //             $Earnings += 1000;
        
        
        //             // Store the downliner's ID in the list of earned downliners
        //             $earnedDownlinerIds[] = $downliner->id;
        //         }
        //     }
        
        //     //Update the user's earned downliner IDs
        //     $this->earned_downliner_ids = $earnedDownlinerIds;
        //     $this->save(); // Persist the changes
        
        //     return $Earnings;
        // }

        
        // private function isWithinPackageLimit($earnedDownlinerCount)
        // {
        //     $packageLimit = [
        //         'Starter' => 16,
        //         'Bronze' => 256,
        //         'Silver' => 4096,
        //         'Gold' => 65536,
        //         'Diamond' => -1, // Unlimited
        //     ];
        
        //     $package = $this->package;
        //     $limit = $packageLimit[$package];
        
        //     // If the package limit is unlimited or the earned downliner count is within the limit
        //     return $limit == -1 || $earnedDownlinerCount < $limit;
        // }
        
        
        public function calculateDownlinersEarnings()
        {
            // Initialize earnings
            $earnings = 0;
        
            // Define package limitations
            $packageLimits = [
                'Starter' => 16,
                'Bronze' => 256,
                'Silver' => 4096,
                'Gold' => 65536,
                'Diamond' => PHP_INT_MAX, // Unlimited
            ];
        
            // Get the user's package
            $userPackage = $this->package;
        
            // Get the downliners of the user
            $downliners = $this->getAllDownlinersExceptDirectReferrals();
        
            // Filter downliners based on is_subscribed status
            $downliners = $downliners->filter(function ($downliner) {
                return $downliner->is_subscribed;
            });
        
            // Limit downliners based on package
            $downliners = $downliners->take($packageLimits[$userPackage]);
        
            // Calculate earnings from downliners
            foreach ($downliners as $downliner) {
                // Add earnings for each downliner
                $earnings += 1000;
            }
        
            return $earnings;
        }

     
    // public function calculateMonthlyDescendantsEarnings()
    // {
    //     // Get the user's eligible descendants whose sub_status is true/1
    //     $eligibleDescendants = $this->allDescendants()
    //         ->where('sub_status', true)
    //         ->get();

    //     // Calculate the package limit based on the user's package
    //     $packageLimit = [
    //         'Starter' => 16,
    //         'Bronze' => 256,
    //         'Silver' => 4096,
    //         'Gold' => 65536,
    //         'Diamond' => -1, // Unlimited
    //     ];

    //     // Retrieve the monthly earned downliner IDs
    //     $monthlyEarnedDownlinerIds = $this->monthly_earned_downliner_ids ?? [];

    //     // Calculate earnings from each eligible descendant
    //     $totalEarnings = 20;
    //     foreach ($eligibleDescendants as $descendant) {
    //         // Check if the descendant has not earned within the past 34 days and within the package limit
    //         if (!$this->hasEarnedFromDescendantWithinLimit($descendant, $packageLimit) &&
    //             ($packageLimit[$this->package] == -1 || count($monthlyEarnedDownlinerIds) < $packageLimit[$this->package])) {
    //             // Add earnings from this descendant
    //             $totalEarnings += 100;

    //             // Store the descendant's ID in the list of monthly earned downliners
    //             $monthlyEarnedDownlinerIds[] = $descendant->id;
    //         }
    //     }

    //     // Update the user's monthly earned downliner IDs
    //     $this->update(['monthly_earned_downliner_ids' => $monthlyEarnedDownlinerIds]);

    //     return $totalEarnings;
    // }

    // /**
    //  * Check if the user has earned from the descendant within the package limit and past 34 days.
    //  *
    //  * @param User $descendant
    //  * @param array $packageLimit
    //  * @return bool
    //  */
    // private function hasEarnedFromDescendantWithinLimit(User $descendant, array $packageLimit): bool
    // {
    //     // Retrieve the monthly earned downliner IDs
    //     $monthlyEarnedDownlinerIds = $this->monthly_earned_downliner_ids ?? [];

    //     // Check if the user has earned from the descendant within the past 34 days
    //     if (in_array($descendant->id, $monthlyEarnedDownlinerIds)) {
    //         $lastEarningDate = Carbon::parse($this->last_monthly_earnings_at);
    //         $differenceInDays = $lastEarningDate->diffInDays(Carbon::now());

    //         if ($differenceInDays < 34) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }
    
    
    public function calculateMonthlyDescendantsEarnings()
    {
        // Initialize earnings
        $earnings = 0;
    
        // Define package limitations
        $packageLimits = [
            'Starter' => 16,
            'Bronze' => 256,
            'Silver' => 4096,
            'Gold' => 65536,
            'Diamond' => PHP_INT_MAX, // Unlimited
        ];
    
        // Get the user's package
        $userPackage = $this->package;
    
        // Get the downliners of the user
        $downliners = $this->getAllDownlinersExceptDirectReferrals();
    
        // Filter downliners based on is_subscribed status
        $downliners = $downliners->filter(function ($downliner) {
            return $downliner->sub_status;
        });
    
        // Limit downliners based on package
        $downliners = $downliners->take($packageLimits[$userPackage]);
    
        // Calculate earnings from downliners
        foreach ($downliners as $downliner) {
            // Check if the downliner has earned in the current month
            $lastMonthlyEarningDate = $downliner->last_monthly_earnings_at;
    
            if (!$lastMonthlyEarningDate || $lastMonthlyEarningDate->diffInDays(now()) >= 30) {
                // Add earnings for each downliner
                $earnings += 100;
            }
            $this->update(['last_monthly_earnings_at' => now()]); // Update last monthly earnings timestamp
        }
    
        return $earnings;
    }



        protected function calculateMonthlyEarnings()
        {
            // Implement logic to calculate monthly earnings based on user's subscription and sub_status
            $lastPaymentDate = $this->last_payment_date;

            if ($this->is_subscribed && $this->sub_status && $lastPaymentDate) {
                $now = Carbon::now();
                $differenceInDays = $now->diffInDays($lastPaymentDate);

                if ($differenceInDays >= 34) {
                    // Payout 2000 as monthly earnings
                    return 2000;
                }
            }

            return 0;
        }


    public function calculateFoodVest()
    {
        // Initialize earnings
        $earnings = 0;
    
        return $earnings;
    }
    
    /**
     * Calculate and update earnings for the user.
     *
     * @return void
     */
    public function calculateEarnings()
    {
        // Calculate earnings
        $starterEarnings = $this->getStarterEarnings();
        $directReferralEarnings = $this->getDirectReferralEarnings();
        $downlinersEarnings = $this->calculateDownlinersEarnings();
        $descendantsMonthlyEarnings = $this->calculateMonthlyDescendantsEarnings();
        $monthlyEarnings = $this->calculateMonthlyEarnings();
        $foodInvestEarnings = $this->calculateFoodVest();

        // Total earnings calculation
        $totalEarnings = $starterEarnings +
                         $directReferralEarnings +
                         $downlinersEarnings +
                         $descendantsMonthlyEarnings +
                         $monthlyEarnings +
                         $foodInvestEarnings;

        // Retrieve the earning record associated with the user
        $earning = $this->earnings;

        // Update earnings record
        $earning->update([
            'starter_earnings' => $starterEarnings,
            'direct_referral_earnings' => $directReferralEarnings,
            'downliners_earnings' => $downlinersEarnings,
            'descendants_monthly_earnings' => $descendantsMonthlyEarnings,
            'monthly_earnings' => $monthlyEarnings,
            'food_invest_earnings' => $foodInvestEarnings,
            'total_earnings' => $totalEarnings,
        ]);
    }

    /**
     * Calculate gross earnings for each earnings category.
     *
     * @return array
     */
    public function calculateGrossEarnings()
    {
        $grossEarnings = [];

        // Retrieve the user's earnings record from the database
        $earnings = $this->earnings()->first();

        // Calculate gross earnings for each earnings category
        
        if ($earnings) {
            // Assign values from the earnings record to the gross earnings array
            $grossEarnings['Starter Pack'] = $earnings->starter_earnings;
            $grossEarnings['Direct Affiliate Income'] = $earnings->direct_referral_earnings;
            $grossEarnings['Activation Income On Downliners'] = $earnings->downliners_earnings;
            $grossEarnings['Earn For Life Income'] = $earnings->descendants_monthly_earnings;
            $grossEarnings['Monthly Pack Bonus'] = $earnings->monthly_earnings;
            $grossEarnings['Food Invest Earnings'] = $earnings->food_invest_earnings;
            $grossEarnings['Total'] = $earnings->total_earnings;
        }

        return $grossEarnings;
    }

    public function calculateWithdrawedEarnings()
{
    $withdrawedEarnings = [
        'Starter Pack' => 0,
        'Direct Affiliate Income' => 0,
        'Activation Income On Downliners' => 0,
        'Earn For Life Income' => 0,
        'Monthly Pack Bonus' => 0,
        'Food Invest Earnings' => 0,
        'Total' => 0,
    ];

    // Retrieve user's withdrawal history
    $userWithdrawals = WithdrawalHistory::where('user_id', $this->id)->get();

    // Calculate total earnings for each earnings category
    foreach ($userWithdrawals as $withdrawal) {
        $withdrawedEarnings['Starter Pack'] += $withdrawal->starter_earnings;
        $withdrawedEarnings['Direct Affiliate Income'] += $withdrawal->direct_referral_earnings;
        $withdrawedEarnings['Activation Income On Downliners'] += $withdrawal->downliners_earnings;
        $withdrawedEarnings['Earn For Life Income'] += $withdrawal->descendants_monthly_earnings;
        $withdrawedEarnings['Monthly Pack Bonus'] += $withdrawal->monthly_earnings;
        $withdrawedEarnings['Food Invest Earnings'] += $withdrawal->food_invest_earnings;
        $withdrawedEarnings['Total'] += $withdrawal->total_earnings;
    }

    return $withdrawedEarnings;
}



    public function calculateNetEarnings()
{
    $netEarnings = [];

    // Get gross earnings
    $grossEarnings = $this->calculateGrossEarnings();

    // Get withdrawed earnings
    $withdrawedEarnings = $this->calculateWithdrawedEarnings();

    // Calculate net earnings for each category
    foreach ($grossEarnings as $category => $gross) {
        $netEarnings[$category] = $gross - $withdrawedEarnings[$category];
    }

    return $netEarnings;
}



    }

