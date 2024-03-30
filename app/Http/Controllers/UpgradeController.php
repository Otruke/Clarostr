<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UpgradeController extends Controller
{
    public function upgrade($package)
    {
        $user = auth()->user();

        // Validate the user's eligibility for upgrade
        $upgradeAmount = $this->calculateUpgradeAmount($user->package, $package);
        if ($upgradeAmount === null) {
            return redirect('/home')->with('error', 'Invalid upgrade request.');
        }

        return view('upgrade.paymentForm', [
            'user' => $user,
            'upgradeAmount' => $upgradeAmount,
            'newPackage' => $package,
        ]);
    }

    private function calculateUpgradeAmount($currentPackage, $newPackage)
    {
        // Define upgrade costs
        $upgradeCosts = [
            'Starter' => ['Bronze' => 12500, 'Silver' => 37500, 'Gold' => 62500, 'Diamond' => 87500],
            'Bronze' => ['Silver' => 25000, 'Gold' => 50000, 'Diamond' => 75000],
            'Silver' => ['Gold' => 25000, 'Diamond' => 50000],
            'Gold' => ['Diamond' => 25000],
            'Diamond' => [],
        ];

        // Check if the upgrade is valid
        if (!array_key_exists($currentPackage, $upgradeCosts) || !array_key_exists($newPackage, $upgradeCosts[$currentPackage])) {
            return null;
        }

        // Calculate the upgrade amount
        return $upgradeCosts[$currentPackage][$newPackage];
    }
}

