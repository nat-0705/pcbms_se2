<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Payments;
use App\Models\PurchaseItems;
use App\Models\Receipts;
use App\Models\SaleItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersReportController extends Controller
{
    public function reports($customers_id)
    {
        $customers['tab_menu']      = 'reports';
        $customers['customers']     = Customers::findOrFail($customers_id);

        $customers['sales']         = SaleItems::select('products.title', DB::raw('SUM(sale_items.quantity) as quantity, AVG(sale_items.price) as price, SUM(sale_items.total) as total'))
                                    ->join('products', 'sale_items.products_id', '=', 'products.id')
                                    ->join('sale_invoices', 'sale_items.sale_invoices_id', '=', 'sale_invoices.id')
                                    ->where('products.has_stock', 1)
                                    ->where('sale_invoices.customers_id', $customers_id)
                                    ->groupBy('products.id')
                                    ->get();
        
        $customers['purchase']     = PurchaseItems::select('products.title', DB::raw('SUM(purchase_items.quantity) as quantity, AVG(purchase_items.price) as price, SUM(purchase_items.total) as total'))
                                    ->join('products', 'purchase_items.products_id', '=', 'products.id')
                                    ->join('purchase_invoices', 'purchase_items.purchase_invoices_id', '=', 'purchase_invoices.id')
                                    ->where('products.has_stock', 1)
                                    ->where('purchase_invoices.customers_id', $customers_id)
                                    ->groupBy('products.id')
                                    ->get();  
                                    
        $customers['receipts']     = Receipts::select('date', DB::raw('SUM(amount) as amount'))
                                    ->where('customers_id', $customers_id)
                                    ->groupBy('date')
                                    ->get();

        $customers['payments']        = Payments::select('date', DB::raw('SUM(amount) as amount'))
                                    ->where('customers_id', $customers_id)
                                    ->groupBy('date')
                                    ->get();

        return view('customers/reports/reports',$customers);
    }
}
