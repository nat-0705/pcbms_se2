<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Payments;
use App\Models\Products;
use App\Models\PurchaseItems;
use App\Models\Receipts;
use App\Models\SaleItems;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard['totalCustomers']    = Customers::count('id');
        $dashboard['totalProducts'] = Products::count('id');
        $dashboard['totalSales']    = SaleItems::sum('total');
        $dashboard['totalPurchase'] = PurchaseItems::sum('total');
        $dashboard['totalReceipts'] = Receipts::sum('amount');
        $dashboard['totalPayments'] = Payments::sum('amount');
        $dashboard['totalStocks']    = PurchaseItems::sum('quantity') - SaleItems::sum('quantity');

        return view('dashboard', $dashboard);
    }
}
