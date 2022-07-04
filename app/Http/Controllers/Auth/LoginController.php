<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {

            auth()->login($user);
            
            return redirect('home');

        } else {

            return redirect()->back();
        }
    }
}
