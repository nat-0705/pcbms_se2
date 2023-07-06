<?php

namespace App\Http\Controllers;

use App\Models\PurchaseInvoices;
use App\Http\Requests\StorePurchaseInvoicesRequest;
use App\Http\Requests\UpdatePurchaseInvoicesRequest;
use App\Models\Customers;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class PurchaseInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $customers['customers'] = Customers::find($id);
        $customers['tab_menu'] = 'purchase';
        return view('customers/purchase/purchase', $customers);
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
    public function store(StorePurchaseInvoicesRequest $request, $customers_id)
    {
        $formData                   = $request->all();
        $formData['customers_id']   = $customers_id;
        $formData['users_id']       = Auth::id();

        if(PurchaseInvoices::create($formData)){
            return redirect()->route('customers.purchase', ['id' => $customers_id])->with('message', 'Purchase Success');
        }
        return redirect()->route('customers.purchase', ['id' => $customers_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($customers_id, $purchase_invoices_id)
    {
        $customers['customers']     = Customers::findOrFail($customers_id);
        $customers['purchase']      = PurchaseInvoices::findOrFail($purchase_invoices_id);
        $customers['products']      = Products::arrayForSelect();
        $customers['tab_menu']      = 'purchase';
        
        return view('customers/purchase/show', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseInvoices $purchaseInvoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseInvoicesRequest $request, PurchaseInvoices $purchaseInvoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers_id, $purchase_invoices_id)
    {
        if(PurchaseInvoices::find($purchase_invoices_id)->delete()){
            return redirect()->route('customers.purchase', ['id'=> $customers_id])->with('message', 'Delete Success');
        }
        return redirect()->route('customers.purchase', ['id'=> $customers_id]);
    }
}
