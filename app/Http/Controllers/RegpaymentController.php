<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegpaymentController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id()); 
        return view('regpayment', compact('user'));
        
    }

    public function preReg()
    {
        $user = User::find(auth()->id()); 
        return view('preRegSuccessful', compact('user')); 
    }
}
