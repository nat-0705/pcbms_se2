<?php

namespace App\Http\Controllers;

use App\Models\SaleItems;
use App\Http\Requests\StoreSaleItemsRequest;
use App\Http\Requests\UpdateSaleItemsRequest;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class SaleItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleItemsRequest $request, $customers_id, $sale_invoices_id)
    {
        $formData                       = $request->all();
        $formData['customers_id']       = $customers_id;
        $formData['sale_invoices_id']    = $sale_invoices_id;
        $formData['users_id']       = Auth::id();

        if(SaleItems::create($formData)){
            return redirect()->route('customers.sales.show', ['id' => $customers_id, 'sale_invoices_id' => $sale_invoices_id])->with('message', 'Item Success');
        }
        return redirect()->route('customers.sales.show', ['id' => $customers_id, 'sale_invoices_id' => $sale_invoices_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleItems $saleItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleItems $saleItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleItemsRequest $request, SaleItems $saleItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers_id, $sale_invoices_id, $sale_items_id)
    {
        if(SaleItems::find($sale_items_id)->delete()){
            return redirect()->route('customers.sales.show', ['id' => $customers_id, 'sale_invoices_id' => $sale_invoices_id])->with('message', 'Delete Success');
        }
        return redirect()->route('customers.sales.show', ['id' => $customers_id, 'sale_invoices_id' => $sale_invoices_id]);
    }
}
