<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Consulting;
use App\Models\Category;
use Illuminate\Http\Request;

class ConsultingController extends Controller
{
    
    public function index()
    {
        $consultings = Consulting::all();

        return view('site.consultings.index', compact('consultings'));

    }//end of index

    
    public function create()
    {
        $categorys = Category::all();

        return view('site.consultings.create', compact('categorys'));

    }//end of create

    
    public function store(Request $request)
    {
        $request_validated = $request->validate([
            'title'       => ['required', 'string'],
            'anser' => ['required', 'string'],
            'question' => ['required', 'string'],
            // 'file'        => ['required'],
            'category_id' => ['required', 'numeric'],
            // 'source'      => ['required', 'string'],
        ]);

        $request_data         = $request_validated;
        // $request_data['file'] = $request->file('file')->store('files', 'public');
        $request_data['user_id'] = auth()->id();

        Consulting::create($request_data);

        return redirect()->route('site.consultings.index');

    }//end of create


    public function show(Consulting $consulting)
    {
        $consulting->update(['views_count' => $consulting->views_count + 1]);

        return view('site.consultings.show', compact('consulting'));

    }//end of show


    public function edit(Consulting $consulting)
    {
        $categorys = Category::all();

        return view('site.consultings.edit', compact('consulting','categorys'));

    }//end of edit


    public function update(Request $request, Consulting $consulting)
    {
        $request_validated = $request->validate([
            'title'       => ['required', 'string'],
            'anser' => ['required', 'string'],
            'question' => ['required', 'string'],
            // 'file'        => ['required'],
            'category_id' => ['required', 'numeric'],
            // 'source'      => ['required', 'string'],
        ]);

        $request_data         = $request_validated;
        // $request_data['file'] = $request->file('file')->store('files', 'public');
        $request_data['user_id'] = auth()->id();

        $consulting->update($request_data);

        return redirect()->route('site.consultings.index');

    }//end of edit

    
    public function destroy(Consulting $consulting)
    {
        $consulting->delete();

        return redirect()->route('site.consultings.index');

    }//end of destroy

}//end of controller
