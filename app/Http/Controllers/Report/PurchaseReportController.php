<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItems;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index(Request $request)
    {
        $report['start_date']   = $request->get('start_date', date('Y-m-d'));
        $report['end_date']     = $request->get('end_date', date('Y-m-d'));
        
        $report['purchase']     = PurchaseItems::select('products.title', 'purchase_items.quantity', 'purchase_items.price', 'purchase_items.total', 'purchase_invoices.bank_no', 'purchase_invoices.date')
                                    ->join('products', 'purchase_items.products_id', '=', 'products.id')
                                    ->join('purchase_invoices', 'purchase_items.purchase_invoices_id', '=', 'purchase_invoices.id')
                                    ->whereBetween('purchase_invoices.date', [$report['start_date'], $report['end_date']])
                                    ->get();


        return view('reports/purchase', $report);
    }
}
