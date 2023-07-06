<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoices extends Model
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
        return $this->hasMany(PurchaseItems::class);
    }
    
    public function payments()
    {
        return $this->hasMany(Payments::class);
    }
}
