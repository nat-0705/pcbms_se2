<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\PurchaseItems;
use App\Models\Receipts;
use App\Models\SaleItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaysReportController extends Controller
{
    public function index(Request $request)
    {
        $report['start_date']   = $request->get('start_date', date('Y-m-d'));
        $report['end_date']     = $request->get('end_date', date('Y-m-d'));

        $report['sales']        = SaleItems::select('products.title', DB::raw('SUM(sale_items.quantity) as quantity, AVG(sale_items.price) as price, SUM(sale_items.total) as total'))
                                    ->join('products', 'sale_items.products_id', '=', 'products.id')
                                    ->join('sale_invoices', 'sale_items.sale_invoices_id', '=', 'sale_invoices.id')
                                    ->whereBetween('sale_invoices.date', [$report['start_date'], $report['end_date']])
                                    ->where('products.has_stock', 1)
                                    ->groupBy('products.id')
                                    ->get();
        
        $report['purchase']     = PurchaseItems::select('products.title', DB::raw('SUM(purchase_items.quantity) as quantity, AVG(purchase_items.price) as price, SUM(purchase_items.total) as total'))
                                    ->join('products', 'purchase_items.products_id', '=', 'products.id')
                                    ->join('purchase_invoices', 'purchase_items.purchase_invoices_id', '=', 'purchase_invoices.id')
                                    ->whereBetween('purchase_invoices.date', [$report['start_date'], $report['end_date']])
                                    ->where('products.has_stock', 1)
                                    ->groupBy('products.id')
                                    ->get();

        $report['receipts']     = Receipts::select('customers.name', DB::raw('SUM(receipts.amount) as amount'))
                                    ->join('customers', 'receipts.customers_id', '=', 'customers.id')
                                    ->whereBetween('date', [$report['start_date'], $report['end_date']])
                                    ->groupBy('customers_id')
                                    ->get();

        $report['payments']     = Payments::select('customers.name', DB::raw('SUM(payments.amount) as amount'))
                                    ->join('customers', 'payments.customers_id', '=', 'customers.id')
                                    ->whereBetween('date', [$report['start_date'], $report['end_date']])
                                    ->groupBy('customers_id')
                                    ->get();

        return view('reports/days', $report);
    }
}
