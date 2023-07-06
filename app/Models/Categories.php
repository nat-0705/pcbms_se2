<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function products()
    {
        return $this->hasMany(products::class);
    }


    public static function arrayForSelect()
    {
        $arr = [];
        $categories = categories::all();
        foreach($categories as $category){
            $arr[$category->id] = $category->title;
        }
        return $arr;
    }
}
