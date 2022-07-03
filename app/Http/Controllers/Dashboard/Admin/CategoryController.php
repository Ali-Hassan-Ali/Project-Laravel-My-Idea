<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:read_categorys')->only(['index']);
        // $this->middleware('permission:create_categorys')->only(['create', 'store']);
        // $this->middleware('permission:update_categorys')->only(['edit', 'update']);
        // $this->middleware('permission:delete_categorys')->only(['delete', 'bulk_delete']);

    }// end of __construct

    public function index()
    {
        return view('dashboard.admin.categorys.index');

    }// end of index

    public function data()
    {
        $categorys = Category::latest()->get();

        return DataTables::of($categorys)
            ->addColumn('record_select', 'dashboard.admin.categorys.data_table.record_select')
            ->editColumn('created_at', function (Category $category) {
                return $category->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'dashboard.admin.categorys.data_table.actions')
            ->rawColumns(['record_select', 'roles', 'actions'])
            ->toJson();

    }// end of data

    public function create()
    {
        return view('dashboard.admin.categorys.create');

    }// end of create

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.admin.categorys.index');

    }// end of store

    public function edit(Category $category)
    {
        return view('dashboard.admin.categorys.edit', compact('category'));

    }// end of edit

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.admin.categorys.index');

    }// end of update

    public function destroy(Category $category)
    {
        $this->delete($category);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $category = Category::FindOrFail($recordId);
            $this->delete($category);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Category $category)
    {
        $category->delete();

    }// end of delete

}//end of controller
