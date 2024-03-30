<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    //
    public function index()
    {
        // Retrieve transactions for the currently authenticated user
        $transaction = UserTransaction::where('user_id', auth()->user()->id)->first();

        return view('home.membership', ['transaction' => $transaction]);
    }
}
