<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class SubpaymentController extends Controller
{
    public function index(){
        $user = User::find(auth()->id());
        return view ('subPayment', compact('user'));

    }
}
