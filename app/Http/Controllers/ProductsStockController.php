<?php

namespace App\Http\Controllers;

use App\Models\Products;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductsStockController extends Controller
{
    public function index()
    {
        $products = Products::where('has_stock', 1)->get();
        return view('products/stocks', ['products' => $products]);
    }
}
