<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsernameCheckController extends Controller
{
    public function check(Request $request)
    {
        $sponsor = $request->input('sponsor');

        $user = User::where('username', $sponsor)->first();

        if ($user) {
            return response()->json(['status' => 'taken']);
        } else {
            return response()->json(['status' => 'available']);
        }
    }
}

