<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    use HasFactory;

    protected $fillable = ['customers_id', 'amount', 'note', 'date', 'users_id', 'sale_invoices_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }
    public function sales()
    {
        return $this->belongsTo(SaleInvoices::class);
    }
}
