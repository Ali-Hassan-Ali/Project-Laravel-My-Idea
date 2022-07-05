<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Chat;
use App\Models\Like;
use App\Models\JoinGroup;
use App\Models\GroupIdea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    
    public function index()
    {
        $ideas = Idea::all();

        return view('site.idea.index', compact('ideas'));

    }//end of index

    
    public function create()
    {
        $categorys = Category::all();

        return view('site.idea.create', compact('categorys'));

    }//end if create


    public function store(Request $request)
    {
         $request_validated = $request->validate([
            'title'       => ['required', 'string'],
            'description' => ['required', 'string'],
            'file'        => ['required'],
            'category_id' => ['required', 'numeric'],
            'source'      => ['required', 'string'],
        ]);

        $request_data         = $request_validated;
        $request_data['file'] = $request->file('file')->store('files', 'public');
        $request_data['user_id'] = auth()->id();

        $idea = Idea::create($request_data);

        $group = Group::create([
            'name'    => $idea->title,
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);

        GroupIdea::create([
            'group_id' => $group->id,
            'user_id'  => auth()->id(),
        ]);

        return redirect()->route('site.ideas.index');

    }//end of create

    
    public function show(Idea $idea)
    {
        $idea->update(['views_count'=>$idea->views_count + 1]);
        
        return view('site.idea.show', compact('idea'));

    }//end of edit

    
    public function edit(Idea $idea)
    {
        $categorys = Category::all();

        return view('site.idea.edit', compact('categorys', 'idea'));

    }//end of edit

    
    public function update(Request $request, Idea $idea)
    {
        $request_validated = $request->validate([
            'title'       => ['required', 'string'],
            'description' => ['required', 'string'],
            // 'file'        => ['required'],
            'category_id' => ['required', 'numeric'],
            'source'      => ['required', 'string'],
        ]);

        $request_data = $request_validated;
        
        if ($request->file) {
            $request_data['file'] = $request->file('file')->store('files', 'public');
        }

        $idea->update($request_data);

        return redirect()->route('site.ideas.index');

    }//end of update


    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('site.ideas.index');

    }//end of destroy

    public function comment(Request $request)
    {
        Comment::create([
            'message' => $request->message,
            'user_id' => auth()->id(),
            'idea_id' => $request->idea_id,
        ]);

        return redirect()->back();

    }//end of comment


    public function like(Idea $idea)
    {

        $like = Like::where('idea_id', $idea->id)->first();

        if (!$like) {
            
            Like::create([
                'user_id'  => auth()->id(),
                'idea_id'  => $idea->id,
            ]);

        } else {

            $like->delete();
            
        }//end if if


        return redirect()->back();

    }//end of like

}//end of controller
