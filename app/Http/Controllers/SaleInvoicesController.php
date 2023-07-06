<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoices;
use App\Http\Requests\StoreSaleInvoicesRequest;
use App\Http\Requests\UpdateSaleInvoicesRequest;
use App\Models\Customers;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class SaleInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($id)
    {
        $customers['customers'] = Customers::find($id);
        $customers['tab_menu'] = 'sales';
        return view('customers/sales/sales', $customers);
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
    public function store(StoreSaleInvoicesRequest $request, $customers_id)
    {
        $formData                   = $request->all();
        $formData['customers_id']   = $customers_id;
        $formData['users_id']       = Auth::id();

        if(SaleInvoices::create($formData)){
            return redirect()->route('customers.sales', ['id' => $customers_id])->with('message', 'Sales Success');
        }
        return redirect()->route('customers.sales', ['id' => $customers_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($customers_id, $sale_invoices_id)
    {
        $customers['customers']     = Customers::findOrFail($customers_id);
        $customers['sales']         = SaleInvoices::findOrFail($sale_invoices_id);
        $customers['products']      = Products::arrayForSelect();
        $customers['tab_menu']      = 'sales';
        
        return view('customers/sales/show', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleInvoices $saleInvoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleInvoicesRequest $request, SaleInvoices $saleInvoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers_id, $sale_invoices_id)
    {
        if(SaleInvoices::find($sale_invoices_id)->delete()){
            return redirect()->route('customers.sales', ['id'=> $customers_id])->with('message', 'Delete Success');
        }
        return redirect()->route('customers.sales', ['id'=> $customers_id]);
    }
}
