<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function customers()
    {
        return $this->hasMany(customers::class);
    }


    public static function arrayForSelect()
    {
        $arr = [];
        $groups = Groups::all();
        foreach($groups as $group){
            $arr[$group->id] = $group->title;
        }
        return $arr;
    }
}
