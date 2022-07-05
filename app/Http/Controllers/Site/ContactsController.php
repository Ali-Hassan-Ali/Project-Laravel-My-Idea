<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function create()
    {
        return view('site.contacts.create');
    }

    public function store(Request $request)
    {
        Contact::create($request->all());

        return redirect('/');
    }

}//end of controller
