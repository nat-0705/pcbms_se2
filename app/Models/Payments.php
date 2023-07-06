<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = ['customers_id', 'amount', 'note', 'date', 'users_id', 'purchase_invoices_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }
    public function purchase()
    {
        return $this->belongsTo(PurchaseInvoices::class);
    }
}
