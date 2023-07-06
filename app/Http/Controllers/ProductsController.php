<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products/products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products['categories']     = Categories::arrayForSelect();
        $products['mode']           = 'create';
        $products['headline']       = 'Sign Up';

        return view('products/form', $products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $formData = $request->all();
        if(products::create($formData)){
            return redirect('/products')->with('message', 'Products Success');
        }
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products['products'] = products::find($id);
        return view('products/show', $products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products['products']   = products::findOrFail($id);
        $products['categories']     = categories::arrayForSelect();
        $products['mode']       = 'edit';
        $products['headline']   = 'Update';
        return view('products/form', $products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request,$id)
    {
        $formData = $request->all();

        $products                   = products::find($id);
        $products->categories_id    = $formData['categories_id'];
        $products->title            = $formData['title'];
        $products->description      = $formData['description'];
        $products->cost_price       = $formData['cost_price'];
        $products->price            = $formData['price'];
        $products->has_stock        = $formData['has_stock'];


        if($products->save()){
            return redirect('/products')->with('message', 'Products Update Success');
        }
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(products::find($id)->delete()){
            return redirect('/products')->with('message', 'Product Delete Success');
        }
        return redirect('/products');
    }
}
