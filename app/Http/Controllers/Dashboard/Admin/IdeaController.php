<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IdeaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:read_ideas')->only(['index']);
        // $this->middleware('permission:create_ideas')->only(['create', 'store']);
        // $this->middleware('permission:update_ideas')->only(['edit', 'update']);
        // $this->middleware('permission:delete_ideas')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        return view('dashboard.admin.ideas.index');

    }// end of index

    public function data()
    {
        $ideas = Idea::latest()->get();

        return DataTables::of($ideas)
            ->addColumn('record_select', 'dashboard.admin.ideas.data_table.record_select')
            ->editColumn('created_at', function (Idea $idea) {
                return $idea->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'dashboard.admin.ideas.data_table.actions')
            ->rawColumns(['record_select', 'roles', 'actions'])
            ->toJson();

    }// end of data

    public function create()
    {
        return view('dashboard.admin.ideas.create');

    }// end of create

    public function store(IdeaRequest $request)
    {
        Idea::create($request->validated());

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.admin.ideas.index');

    }// end of store

    public function edit(Idea $idea)
    {
        return view('dashboard.admin.ideas.edit', compact('idea'));

    }// end of edit

    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->update($request->validated());

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.admin.ideas.index');

    }// end of update

    public function destroy(Idea $idea)
    {
        $this->delete($idea);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $idea = Idea::FindOrFail($recordId);
            $this->delete($idea);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Idea $idea)
    {
        $idea->delete();

    }// end of delete

}//end of controller
