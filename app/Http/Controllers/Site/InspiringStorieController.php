<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\InspiringStorie;
use App\Models\Like;
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

        return redirect()->route('site.inspiring_storie.index');

    }//end omf store

    
    public function show(InspiringStorie $inspiring_storie)
    {

        $inspiring_storie->update(['views_count' => $inspiring_storie->views_count + 1]);

        return view('site.inspiring_stories.show', compact('inspiring_storie'));

    }//end of show

    
    public function edit(InspiringStorie $inspiring_storie)
    {
        return view('site.inspiring_stories.edit', compact('inspiring_storie'));

    }//end of edit


    public function update(Request $request, InspiringStorie $inspiring_storie)
    {
        $request_validated = $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        $request_data = $request_validated;
        $request_data['user_id'] = auth()->id();

        $inspiring_storie->update($request_data);

        return redirect()->route('site.inspiring_storie.index');

    }//end omf update

    
    public function destroy(InspiringStorie $inspiring_storie)
    {
        $inspiring_storie->delete();

        return redirect()->route('site.inspiring_storie.index');

    }//end omf destroy

    public function like(InspiringStorie $inspiring_storie)
    {
        $like = Like::where([
                    'user_id' => auth()->id(),
                    'inspiring_storie_id' => $inspiring_storie->id
                    ])->first();

        if (!$like) {
            
            Like::create([
                'user_id'             => auth()->id(),
                'inspiring_storie_id' => $inspiring_storie->id,
            ]);

        } else {

            $like->delete();
        }


        return redirect()->back();

    }//end of like

}//end of controller
