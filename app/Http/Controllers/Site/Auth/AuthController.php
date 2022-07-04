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


    public function register(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $request_data = $request->except('password','confirmed_password');
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);

        if($user) {

            auth()->login($user);
            
            return redirect('home');

        } else {

            return redirect()->back();
        }

    }//end of fun

}//ebd of cintroller
