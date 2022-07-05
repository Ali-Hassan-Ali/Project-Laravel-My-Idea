<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        auth()->login(User::first());
        
        return view('home');
        
    }//end of index

}//end of controller
