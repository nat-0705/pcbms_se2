<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model
{
    use HasFactory;

    protected $fillable = ['products_id','sale_invoices_id', 'quantity', 'price', 'total'];

    public function sales()
    {
        return $this->belongsTo(SaleInvoices::class, 'sale_invoices_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
