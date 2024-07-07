<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $referralUsername = $request->session()->get('referralUsername');
        return view('welcome', ['referralUsername' => $referralUsername]);
        
    }

    public function preLaunch(Request $request)
    {
        $referralUsername = $request->session()->get('referralUsername');
        return view('pre-launch', ['referralUsername' => $referralUsername]);
        
    }
}
