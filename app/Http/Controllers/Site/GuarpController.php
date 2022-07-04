<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Group;
use App\Models\GroupIdea;

class GuarpController extends Controller
{
    public function index(Idea $idea)
    {
        return view('site.idea.groups.index', compact('idea'));

    }//end of index

    public function create(Idea $idea)
    {
        return view('site.idea.groups.create', compact('idea'));

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'group_id' => 'required',
        ]);

        $group = Group::create([
            'name'    => $request->name,
            'idea_id' => $request->group_id,
            'user_id' => auth()->id(),
        ]);

        GroupIdea::create([
            'group_id' => $group->id,
            'user_id'  => auth()->id(),
        ]);

        return redirect()->route('site.ideas.groups.show', $group->id);

    }//end of create

    public function show(Group $group)
    {
        return view('site.idea.groups.show', compact('group'));

    }//end of show

    public function join(Group $group)
    {
        $groupIn = $group->where('user_id', auth()->id())->first();

        if (!$groupIn) {
            
            GroupIdea::create([
                'group_id' => $group->id,
                'user_id'  => auth()->id(),
            ]);
        }


        return redirect()->route('site.ideas.groups.show', $group->id);

    }//end of join

}//end of fun
