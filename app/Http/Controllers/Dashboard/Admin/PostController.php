<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:read_posts')->only(['index']);
        // $this->middleware('permission:create_posts')->only(['create', 'store']);
        // $this->middleware('permission:update_posts')->only(['edit', 'update']);
        // $this->middleware('permission:delete_posts')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        return view('dashboard.admin.posts.index');

    }// end of index

    public function data()
    {
        $posts = Post::latest()->get();

        return DataTables::of($posts)
            ->addColumn('record_select', 'dashboard.admin.posts.data_table.record_select')
            ->editColumn('created_at', function (Post $post) {
                return $post->created_at->format('Y-m-d');
            })
            ->addColumn('comment_count', function (Post $post) {
                return $post->comments->count();
            })
            ->addColumn('like_count', function (Post $post) {
                return $post->like->count();
            })
            ->editColumn('image', function (Post $post) {
                return view('dashboard.admin.posts.data_table.image', compact('post'));
            })
            ->addColumn('actions', 'dashboard.admin.posts.data_table.actions')
            ->rawColumns(['record_select', 'roles', 'actions'])
            ->toJson();

    }// end of data

    public function create()
    {
        return view('dashboard.admin.posts.create');

    }// end of create

    public function store(PostRequest $request)
    {
        $request_data          = $request->validated();
        $request_data['image'] = $request->file('image')->store('post_images', 'public');
        $request_data['user_id'] = auth()->id();

        Post::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.admin.posts.index');

    }// end of store

    public function edit(Post $post)
    {
        return view('dashboard.admin.posts.edit', compact('post'));

    }// end of edit

    public function update(PostRequest $request, Post $post)
    {
        $request_data          = $request->validated();
        if ($request->image) {
            $request_data['image'] = $request->file('image')->store('post_images', 'public');
        }
        $request_data['user_id'] = auth()->id();

        $post->update($request_data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.admin.posts.index');

    }// end of update

    public function destroy(Post $post)
    {
        $this->delete($post);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $post = Post::FindOrFail($recordId);
            $this->delete($post);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Post $post)
    {
        $post->delete();

    }// end of delete

}//end of controller
