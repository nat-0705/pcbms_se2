<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomersReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\PurchaseInvoicesController;
use App\Http\Controllers\PurchaseItemsController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\Report\DaysReportController;
use App\Http\Controllers\Report\PaymentsReportController;
use App\Http\Controllers\Report\PurchaseReportController;
use App\Http\Controllers\Report\ReceiptsReportController;
use App\Http\Controllers\Report\SalesReportController;
use App\Http\Controllers\SaleInvoicesController;
use App\Http\Controllers\SaleItemsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('confirm', [LoginController::class,'confirm'])->name('login.confirm');

Route::middleware(['auth', 'auth.session'])->group(function () {
        // Route::get('/', function () {
        //     return view('dashboard'); 
        // });
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('logout', [LoginController::class,'logout'])->name('logout');

        Route::get('groups',            [GroupsController::class,'index'])->name('groups');
        Route::get('groups/create',     [GroupsController::class,'create']);
        Route::post('groups',           [GroupsController::class,'store']);
        Route::delete('groups/{id}',    [GroupsController::class,'destroy']);
        


        Route::resource('customers',        CustomersController::class);

            Route::get('customers/{id}/reports',  [CustomersReportController::class,'reports'])->name('customers.reports');


            Route::get('customers/{id}/sales',                          [SaleInvoicesController::class,'index'])->name('customers.sales');
            Route::post('customers/{id}/sales',                         [SaleInvoicesController::class,'store'])->name('customers.sales.store');
            Route::get('customers/{id}/sales/{sale_invoices_id}',       [SaleInvoicesController::class,'show'])->name('customers.sales.show');
            Route::delete('customers/{id}/sales/{sale_invoices_id}',    [SaleInvoicesController::class,'destroy'])->name('customers.sales.destroy');
                //Sales Items
                Route::post('customers/{id}/sales/{sale_invoices_id}/items',                        [SaleItemsController::class,'store'])->name('customers.sales.items.store');
                Route::delete('customers/{id}/sales/{sale_invoices_id}/items/{sales_items_id}',     [SaleItemsController::class,'destroy'])->name('customers.sales.items.destroy');


            Route::get('customers/{id}/receipts',                           [ReceiptsController::class,'index'])->name('customers.receipts');
            Route::post('customers/{id}/receipts/{sale_invoices_id?}',      [ReceiptsController::class,'store'])->name('customers.receipts.store');
            Route::delete('customers/{id}/receipts/{receipts_id}',          [ReceiptsController::class,'destroy'])->name('customers.receipts.destroy');


            Route::get('customers/{id}/purchase',                               [PurchaseInvoicesController::class,'index'])->name('customers.purchase');
            Route::post('customers/{id}/purchase',                              [PurchaseInvoicesController::class,'store'])->name('customers.purchase.store');
            Route::get('customers/{id}/purchase/{purchase_invoices_id}',        [PurchaseInvoicesController::class,'show'])->name('customers.purchase.show');
            Route::delete('customers/{id}/purchase/{purchase_invoices_id}',     [PurchaseInvoicesController::class,'destroy'])->name('customers.purchase.destroy');
                //Purchase Items
                Route::post('customers/{id}/purchase/{purchase_invoices_id}/items',                        [PurchaseItemsController::class,'store'])->name('customers.purchase.items.store');
                Route::delete('customers/{id}/purchase/{purchase_invoices_id}/items/{purchase_items_id}',  [PurchaseItemsController::class,'destroy'])->name('customers.purchase.items.destroy');


            Route::get('customers/{id}/payments',                           [PaymentsController::class,'index'])->name('customers.payments');
            Route::post('customers/{id}/payments/{purchase_invoices_id?}',  [PaymentsController::class,'store'])->name('customers.payments.store');
            Route::delete('customers/{id}/payments/{payments_id}',          [PaymentsController::class,'destroy'])->name('customers.payments.destroy');


            
        Route::resource('categories', CategoriesController::class)->except('show');
        Route::resource('products', ProductsController::class);
        Route::get('stocks', [ProductsStockController::class,'index'])->name('stocks');

        Route::get('payments', [PaymentsReportController::class,'index'])->name('report.payments');
        Route::get('purchase', [PurchaseReportController::class,'index'])->name('report.purchase');
        Route::get('receipts', [ReceiptsReportController::class,'index'])->name('report.receipts');
        Route::get('sales', [SalesReportController::class,'index'])->name('report.sales');
        Route::get('days', [DaysReportController::class,'index'])->name('report.days');


});



