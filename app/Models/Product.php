<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

//        public function order()
//    {
//        return $this->hasMany(  Order::class, "product_id" )->where('user_id',auth()->id());
//    }
}
