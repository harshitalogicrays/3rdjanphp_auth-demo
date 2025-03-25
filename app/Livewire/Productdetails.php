<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Productdetails extends Component
{  
    public $product ,$qtyCount=1;

    public function mount($product){
        $this->product =  $product;
    }

    function addToCart($productId){
        if(Auth::check()){
            Cart::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$productId,
                'quantity'=>$this->qtyCount
            ]);
            //$this->emit('cartAddedOrUpdated')
            $this->dispatch('message' ,
            ['text'=>$this->product->name." added to cart",
            'type'=>'success', 'status'=>200
        ]);
        }
        else {
            $this->dispatch('message' ,
            ['text'=>'Please Login First',
            'type'=>'error', 'status'=>400
        ]);
        }
    }
    function decrementQty(){
        if($this->qtyCount >1){
            $this->qtyCount--;
        }
        else $this->qtyCount=1;
    }
    function incrementQty(){
        if($this->qtyCount < $this->product->qty){
            $this->qtyCount++;
        }
    }
    public function render()
    {
        return view('livewire.productdetails');
    }
}
