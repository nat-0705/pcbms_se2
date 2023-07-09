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
        $groups['mode']      = 'create';
        $groups['headline']  = 'Group';

        return view('groups/form', $groups);
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
    public function edit($id)
    {
        $groups['groups'] = Groups::findOrFail($id);
        $groups['mode']      = 'edit';
        $groups['headline']  = 'Update';
        return view('groups/form', $groups);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupsRequest $request, $id)
    {
        $formData = $request->all();

        $groups          = Groups::find($id);
        $groups->title   = $formData['title'];

        if($groups->save()){
            return redirect('/groups')->with('message', 'Groups Update Success');
        }
        return redirect('/groups');
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
