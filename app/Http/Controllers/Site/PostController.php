<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('site.posts.index', compact('posts'));

    }//end of index

    
    public function create()
    {
        return view('site.posts.create');

    }//end if create


    public function store(Request $request)
    {
         $request_validated = $request->validate([
            'title'       => ['required', 'string'],
            'body'        => ['required', 'string'],
            'image'       => ['required', 'image'],
        ]);

        $request_data          = $request_validated;
        $request_data['image'] = $request->file('image')->store('post_images', 'public');
        $request_data['user_id'] = auth()->id();

         Post::create($request_data);

        return redirect()->route('site.posts.index');

    }//end of create

    
    public function show(Post $post)
    {
        $post->update(['views_count'=>$post->views_count + 1]);
        
        return view('site.posts.show', compact('post'));

    }//end of edit

    
    public function edit(Post $post)
    {
        return view('site.posts.edit', compact('post'));

    }//end of edit

    
    public function update(Request $request, Post $post)
    {
        $request_validated = $request->validate([
            'title'       => ['required', 'string'],
            'body'        => ['required', 'string'],
            'image'       => ['image'],
        ]);

        $request_data          = $request_validated;

        if ($request->image) {
            $request_data['image'] = $request->file('image')->store('post_images', 'public');
        }

        $request_data['user_id'] = auth()->id();

        $post->update($request_data);

        return redirect()->route('site.posts.index');

    }//end of update


    public function destroy(post $post)
    {
        $post->delete();

        return redirect()->route('site.posts.index');

    }//end of destroy

    public function comment(Request $request)
    {
        Comment::create([
            'message' => $request->message,
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
        ]);

        return redirect()->back();

    }//end of comment


    public function like(post $post)
    {
        $like = Like::where([
                    'user_id' => auth()->id(),
                    'post_id' => $post->id
                    ])->first();

        if (!$like) {
            
            Like::create([
                'user_id'  => auth()->id(),
                'post_id'  => $post->id,
            ]);

        } else {

            $like->delete();
            
        }//end if if


        return redirect()->back();

    }//end of like

}//end of controller
