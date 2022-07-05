<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\InspiringStorie;
use Illuminate\Http\Request;

class InspiringStorieController extends Controller
{
    
    public function index()
    {
        $inspiring_stories = InspiringStorie::all();

        return view('site.inspiring_stories.index', compact('inspiring_stories'));

    }//end of index

    
    public function create()
    {
        return view('site.inspiring_stories.create');

    }//end of create

    
    public function store(Request $request)
    {
        $request_validated = $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        $request_data = $request_validated;
        $request_data['user_id'] = auth()->id();

        InspiringStorie::create($request_data);

        return redirect()->route('site.inspiring_stories.index');

    }//end omf store

    
    public function show($id)
    {
        $inspiringStorie = InspiringStorie::find($id);

        return view('site.inspiring_stories.show', compact('inspiringStorie'));

    }//end of show

    
    public function edit($id)
    {
        $inspiringStorie = InspiringStorie::find($id);

        return view('site.inspiring_stories.edit', compact('inspiringStorie'));

    }//end of edit


    public function update(Request $request, $id)
    {
        $request_validated = $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        $request_data = $request_validated;
        $request_data['user_id'] = auth()->id();

        $inspiringStorie = InspiringStorie::find($id);

        $inspiringStorie->update($request_data);

        return redirect()->route('site.inspiring_stories.index');

    }//end omf update

    
    public function destroy($id)
    {
        $inspiringStorie = InspiringStorie::find($id);

        $inspiringStorie->delete();

        return redirect()->route('site.inspiring_stories.index');

    }//end omf destroy

}//end of controller
