<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoices extends Model
{
    use HasFactory;

    protected $fillable = ['customers_id', 'bank_no', 'note', 'date', 'users_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItems::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipts::class);
    }
}
