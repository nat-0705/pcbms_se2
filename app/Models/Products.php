<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['categories_id' ,'title', 'description','cost_price', 'price', 'unit', 'has_stock'];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItems::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItems::class);
    }

    public static function arrayForSelect()
    {
        $arr = [];
        $products = Products::all();
        foreach($products as $product){
            $arr[$product->id] = $product->title;
        }
        return $arr;
    }
    
}
