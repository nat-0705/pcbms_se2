<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\SaleItems;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function index(Request $request)
    {
        $report['start_date']   = $request->get('start_date', date('Y-m-d'));
        $report['end_date']     = $request->get('end_date', date('Y-m-d'));
        $report['sales']        = SaleItems::select('products.title', 'sale_items.quantity', 'sale_items.price', 'sale_items.total', 'sale_invoices.bank_no', 'sale_invoices.date')
                                    ->join('products', 'sale_items.products_id', '=', 'products.id')
                                    ->join('sale_invoices', 'sale_items.sale_invoices_id', '=', 'sale_invoices.id')
                                    ->whereBetween('sale_invoices.date', [$report['start_date'], $report['end_date']])
                                    ->get();


        return view('reports/sales', $report);
    }
}
