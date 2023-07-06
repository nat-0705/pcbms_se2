<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('categories/categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories['mode']      = 'create';
        $categories['headline']  = 'Category';

        return view('categories/form', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriesRequest $request)
    {
        $formData = $request->all();
        if(Categories::create($formData)){
            return redirect('/categories')->with('message', 'Category Success');
        }
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories['categories'] = Categories::findOrFail($id);
        $categories['mode']      = 'edit';
        $categories['headline']  = 'Update';
        return view('categories/form', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {
        $formData = $request->all();

        $categories          = Categories::find($id);
        $categories->title   = $formData['title'];

        if($categories->save()){
            return redirect('/categories')->with('message', 'Category Update Success');
        }
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Categories::find($id)->delete()){
            return redirect('/categories')->with('message', 'Category Delete Success');
        }
        return redirect('/categories');
    }
}
