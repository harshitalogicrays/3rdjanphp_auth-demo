<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable  = ["name","category","brand","description","selling_price","original_price","status","qty","image"];
}
