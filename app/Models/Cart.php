<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table= 'cart';
//    public function product()
//    {
//        return $this->BelongsTo(  Product::class, "product_id" );
//    }
}
