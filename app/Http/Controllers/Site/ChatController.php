<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message'  => 'required',
            'group_id' => 'required',
        ]);

        Chat::create([
            'group_id' => $request->group_id,
            'message'  => $request->message,
            'user_id'  => auth()->id(),
        ]);

        return redirect()->back();

    }//end of store

}//end of controller
