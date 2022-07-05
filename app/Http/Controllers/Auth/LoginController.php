<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('site.auth.login');

    }//end of login form


    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {

            $credentials = $request->only('password','email');

            if (auth()->attempt($credentials)) {

                return redirect('/');
            }

            return redirect()->back()->with(['password' => __('auth.no_password')])->withInput();
            

        } else {

            return redirect()->back()->with(['email' => __('auth.no_email')])->withInput();
        }

    }//end of login

    public function logout()
    {
        auth()->logout();

        return redirect('/');

    }//en end of logout

}//end if controller
