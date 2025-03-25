<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table="cart";
    protected $fillable=['user_id','product_id','quantity'];

    public function product(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
