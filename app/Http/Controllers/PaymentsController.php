<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $customers['customers'] = Customers::find($id);
        $customers['tab_menu'] = 'payments';
        return view('customers/payments/payments', $customers);
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
    public function store(StorePaymentsRequest $request, $customers_id, $purchase_invoices_id = null)
    {
        $formData                   = $request->all();
        $formData['customers_id']   = $customers_id;
        $formData['users_id']       = Auth::id();

        if($purchase_invoices_id){
            $formData['purchase_invoices_id'] = $purchase_invoices_id;
        }
        if(Payments::create($formData)){
            if($purchase_invoices_id){
                return redirect()->route('customers.purchase.show', ['id' => $customers_id, 'purchase_invoices_id' => $purchase_invoices_id])->with('message', 'Payment Success');
            }
        }
        return redirect()->route('customers.payments', ['id' => $customers_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentsRequest $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customers_id, $payments_id)
    {
        if(Payments::find($payments_id)->delete()){
            return redirect()->route('customers.payments', ['id'=> $customers_id])->with('message', 'Delete Success');
        }
        return redirect()->route('customers.payments', ['id'=> $customers_id]);
    }
}
