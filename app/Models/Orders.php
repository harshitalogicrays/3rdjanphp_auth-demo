<?php

namespace App\Models;

use App\Models\OrderItems;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table="orders";
    protected $fillable=['user_id','tracking_no','fullname','email','phone','pincode','address','status_message','payment_mode','payment_id'];
    
    public function orderItems(){
        return $this->hasMany(OrderItems::class,'order_id','id');
    }
}
