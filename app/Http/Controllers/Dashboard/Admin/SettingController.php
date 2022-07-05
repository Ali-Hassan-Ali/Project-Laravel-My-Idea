<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.settings.create');

    }//end of model

    public function store(Request $request)
    {
        // $request->validate([
        //     'email' => 'sometimes|nullable|email',
        // ]);

        $requestData = $request->except(['_token', '_method']);

        if ($request->logo) {
            Storage::disk('local')->delete('public/uploads/' . setting('logo'));
            $request->logo->store('public/uploads');
            $requestData['logo'] = $request->logo->hashName();
        }

        if ($request->fav_icon) {
            Storage::disk('local')->delete('public/uploads/' . setting('fav_icon'));
            $request->fav_icon->store('public/uploads');
            $requestData['fav_icon'] = $request->fav_icon->hashName();
        }

        setting($requestData)->save();

        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();

    }// end of store

}//end if controller
