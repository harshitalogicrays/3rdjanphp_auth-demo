<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Orders;
use Livewire\Component;
use App\Models\OrderItems;
use Illuminate\Support\Str;

class Checkout extends Component
{
    public $fullname , $email, $phone, $address,$pincode;
    public $totalAmount , $carts;

    public function rules(){
        return [
            'fullname'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string|min:10|max:10',
            'pincode'=>'required|string|min:6|max:6',
            'address'=>'required|string|max:500',
        ];
    }

    public function totalCartAmount(){
        $this->totalAmount = 0;
        $this->carts =  Cart::where('user_id',auth()->user()->id)->get(); 
        foreach($this->carts as $cartItem){
            $this->totalAmount += $cartItem->product->selling_price *$cartItem->quantity;  
        }
        return $this->totalAmount;
    }

public function mount(){
    $this->email = auth()->user()->email;
    $this->fullname = auth()->user()->name;
}

    public function placeorder(){
        $this->validate();
        $orders = Orders::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'in progress',
            'payment_mode'=>'cash on delivery'  ]);

        foreach($this->carts as $cartItem){
            $orderItem = OrderItems::create([
              'order_id'=>$orders->id,
              'product_id'=>$cartItem->product_id,
              'quantity'=>$cartItem->quantity,
              'price'=>$cartItem->product->selling_price]);
        }

        Cart::where('user_id',auth()->user()->id)->delete();
        $this->dispatch('cartAddedOrUpdated');
        $this->dispatch('message' ,
        ['text'=>"order placed" ,
      'type'=>'success', 'status'=>200    ]);
    return redirect('/thankyou');
    }

    public function render()
    {       $this->totalAmount = $this->totalCartAmount();
        return view('livewire.checkout',['totalAmount'=>$this->totalAmount]);
    }
}
