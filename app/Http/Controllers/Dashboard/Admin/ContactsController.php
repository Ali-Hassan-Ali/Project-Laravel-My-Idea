<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactsController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.contacts.index');

    }// end of index

    public function data()
    {
        $contact = Contact::latest()->get();

        return DataTables::of($contact)
            ->addColumn('record_select', 'dashboard.admin.categorys.data_table.record_select')
            ->editColumn('created_at', function (Contact $contact) {
                return $contact->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'dashboard.admin.categorys.data_table.actions')
            ->rawColumns(['record_select', 'roles', 'actions'])
            ->toJson();

    }// end of data

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
