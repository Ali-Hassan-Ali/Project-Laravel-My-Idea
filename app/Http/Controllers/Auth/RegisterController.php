<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('site.auth.register');

    }//end if register form

    public function register(RegisterRequest $request)
    {
        $requestData = $request->validated();
        $requestData['password'] = bcrypt($request->password);

        $user = User::create($request->except('password_confirmation'));

        auth()->login($user);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('site.home');

    }//end of register

}//end of controller
