<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;
    public function increaseQty($id){
       $cartData = Cart::where('id',$id)->where('user_id',auth()->user()->id)->first(); 
       if($cartData->product->qty > $cartData->quantity){
            $cartData->increment('quantity');
        }
        else {
            $this->dispatch('message' ,
            ['text'=>'only' .$cartData->product->qty . ' qty available' ,
            'type'=>'error', 'status'=>400
        ]);
        }
    }
    public function decreaseQty($id){
        $cartData = Cart::where('id',$id)->where('user_id',auth()->user()->id)->first(); 
        if($cartData->quantity >1){
             $cartData->decrement('quantity');
         }
         else {
            $cartData->quantity = 1;
         }
    }
    public function removefromcart($id){
        $cartData = Cart::where('id',$id)->where('user_id',auth()->user()->id)->delete(); 
         $this->dispatch('cartAddedOrUpdated');
    }
    public function emptycart(){
        $cartData = Cart::where('user_id',auth()->user()->id)->get(); 
        foreach($cartData as $item){
            $item->delete();
        }
         $this->dispatch('cartAddedOrUpdated');
    }


    public function render()
    {   
        $this->cart =  Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.cart-show',['cart'=>$this->cart]);
    }
}
