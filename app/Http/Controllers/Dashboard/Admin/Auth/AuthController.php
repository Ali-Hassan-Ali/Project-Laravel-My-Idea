<?php

namespace App\Http\Controllers\Dashboard\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->only('form_login');
        
    }//end of __construct

    public function form_login()
    {
        return view('dashboard.admin.auth.login');

    }//end of form login

    public function login_store(Request $request)
    {
        
        $admin = Admin::where('email', $request->email)->first();

        auth('admin')->login($admin);

        return redirect()->route('dashboard.admin.home');

    }//end of auth

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('dashboard.admin.login');

    }//end of logout

}//end of Controller
