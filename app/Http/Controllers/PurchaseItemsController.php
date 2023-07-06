<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItems;
use App\Http\Requests\StorePurchaseItemsRequest;
use App\Http\Requests\UpdatePurchaseItemsRequest;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class PurchaseItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StorePurchaseItemsRequest $request, $customers_id, $purchase_invoices_id)
    {
        $formData                           = $request->all();
        $formData['customers_id']           = $customers_id;
        $formData['purchase_invoices_id']   = $purchase_invoices_id;
        $formData['users_id']               = Auth::id();

        if(PurchaseItems::create($formData)){
            return redirect()->route('customers.purchase.show', ['id' => $customers_id, 'purchase_invoices_id' => $purchase_invoices_id])->with('message', 'Item Success');
        }
        return redirect()->route('customers.purchase.show', ['id' => $customers_id, 'purchase_invoices_id' => $purchase_invoices_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseItems $purchaseItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseItems $purchaseItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseItemsRequest $request, PurchaseItems $purchaseItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers_id, $purhcase_invoices_id, $purhcase_items_id)
    {
        if(PurchaseItems::find($purhcase_items_id)->delete()){
            return redirect()->route('customers.purchase.show', ['id' => $customers_id, 'purchase_invoices_id' => $purhcase_invoices_id])->with('message', 'Delete Success');
        }
        return redirect()->route('customers.purchase.show', ['id' => $customers_id, 'purchase_invoices_id' => $purhcase_invoices_id]);
    }
}
