<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = ['groups_id' ,'name', 'email','phone', 'address'];

    public function groups()
    {
        return $this->belongsTo(Groups::class);
    }

    public function sales()
    {
        return $this->hasMany(SaleInvoices::class);
    }

    public function saleItems()
    {
        return $this->hasManyThrough(SaleItems::class, SaleInvoices::class);
    }

    public function purchase()
    {
        return $this->hasMany(PurchaseInvoices::class);
    }

    public function purchaseItems()
    {
        return $this->hasManyThrough(PurchaseItems::class, PurchaseInvoices::class);
    }

    public function payments()
    {
        return $this->hasMany(Payments::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipts::class);
    }

}
