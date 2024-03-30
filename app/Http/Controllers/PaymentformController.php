<?php

namespace App\Http\Controllers;
use Illuminate\Http\User;

use Illuminate\Http\Request;

class PaymentformController extends Controller
{
    public function upgradePayment()
    {
        $user = User::find(auth()->id());
        return view('paymentForm', compact('user'));

    }
}
