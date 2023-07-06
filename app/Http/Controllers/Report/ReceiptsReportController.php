<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Receipts;
use Illuminate\Http\Request;

class ReceiptsReportController extends Controller
{
    public function index(Request $request)
    {
        $report['start_date']   = $request->get('start_date', date('Y-m-d'));
        $report['end_date']     = $request->get('end_date', date('Y-m-d'));
        $report['receipts']     = Receipts::whereBetween('date', [$report['start_date'], $report['end_date']])
                                    ->get();

        return view('reports/receipts', $report);
    }
}
