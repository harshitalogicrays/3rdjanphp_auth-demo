<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function index(){
        return view('checkout');
    }
    function thankyou(){
        return view('thank-you');
    }
}
