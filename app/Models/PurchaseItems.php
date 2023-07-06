<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    use HasFactory;

    protected $fillable = ['products_id','purchase_invoices_id', 'quantity', 'price', 'total'];

    public function purchase()
    {
        return $this->belongsTo(PurchaseInvoices::class);
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
