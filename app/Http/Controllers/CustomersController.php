<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Report\SalesReportController;
use App\Models\Customers;
use App\Models\Groups;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use App\Models\SaleItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $groups_id = $request->get('groups');

        if($groups_id){
            $customers['customers'] = Customers::where('groups_id', $groups_id)->get();
        }
        else{
            $customers['customers']  = Customers::all();
        }
        $customers['groups'] = Groups::all();    

        return view('customers/customers', $customers);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers['groups'] = Groups::arrayForSelect();
        $customers['mode'] = 'create';
        $customers['headline'] = 'Sign Up';

        return view('customers/form', $customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request)
    {
        $formData = $request->all();
        if(Customers::create($formData)){
            return redirect('/customers')->with('message', 'Customer Success');
        }
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customers['customers'] = Customers::find($id);
        $customers['tab_menu'] = 'user_info';
        return view('customers/show', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customers['customers'] = Customers::findOrFail($id);
        $customers['groups']    = Groups::arrayForSelect();
        $customers['mode']      = 'edit';
        $customers['headline']  = 'Update';
        return view('customers/form', $customers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, $id)
    {
        $formData = $request->all();

        $customers              = customers::find($id);
        $customers->groups_id   = $formData['groups_id'];
        $customers->name        = $formData['name'];
        $customers->email       = $formData['email'];
        $customers->phone       = $formData['phone'];
        $customers->address     = $formData['address'];

        if($customers->save()){
            return redirect('/customers')->with('message', 'Customer Update Success');
        }
        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(customers::find($id)->delete()){
            return redirect('/customers')->with('message', 'Customer Delete Success');
        }
        return redirect('/customers');
    }
}
