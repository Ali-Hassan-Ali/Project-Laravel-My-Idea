<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
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

    }//end of fun

}//ebd of cintroller
