<?php

namespace App\Http\Controllers;

use App\Models\Receipts;
use App\Http\Requests\StoreReceiptsRequest;
use App\Http\Requests\UpdateReceiptsRequest;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class ReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $customers['customers'] = Customers::find($id);
        $customers['tab_menu'] = 'receipts';
        return view('customers/receipts/receipts', $customers);
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
    public function store(StoreReceiptsRequest $request, $customers_id, $sale_invoices_id = null)
    {
        $formData                   = $request->all();
        $formData['customers_id']   = $customers_id;
        $formData['users_id']       = Auth::id();

        if($sale_invoices_id){
            $formData['sale_invoices_id'] = $sale_invoices_id;
        }
        if(Receipts::create($formData)){
            if($sale_invoices_id){
                return redirect()->route('customers.sales.show', ['id' => $customers_id, 'sale_invoices_id' => $sale_invoices_id])->with('message', 'Receipt Success');
            }
        }
        return redirect()->route('customers.receipts', ['id' => $customers_id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Receipts $receipts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipts $receipts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReceiptsRequest $request, Receipts $receipts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers_id, $receipts_id)
    {
        if(Receipts::find($receipts_id)->delete()){
            return redirect()->route('customers.receipts', ['id'=> $customers_id])->with('message', 'Delete Success');
        }
        return redirect()->route('customers.receipts', ['id'=> $customers_id]);
    }
}
