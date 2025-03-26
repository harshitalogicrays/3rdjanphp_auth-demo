<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{   
    public $cartCount;
    protected $listeners = ['cartAddedOrUpdated' => 'checkCartCount'];
    public function checkCartCount(){
        if(Auth::check()){
            return Cart::where('user_id',auth()->user()->id)->count();
        }
        else return 0;
    }
    public function render()
    {   $this->cartCount =  $this->checkCartCount();
        return view('livewire.cart-count');
    }
}
