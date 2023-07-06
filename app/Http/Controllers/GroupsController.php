<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Http\Requests\StoreGroupsRequest;
use App\Http\Requests\UpdateGroupsRequest;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Groups::all();
        return view('groups/groups', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupsRequest $request)
    {
        $formData = $request->all();
        if(groups::create($formData)){
            return redirect('/groups')->with('message', 'Group Success');
        }
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(Groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupsRequest $request, Groups $groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(groups::find($id)->delete()){
            return redirect('/groups')->with('message', 'Group Delete Success');
        }
        return redirect('/groups');
    }
}
