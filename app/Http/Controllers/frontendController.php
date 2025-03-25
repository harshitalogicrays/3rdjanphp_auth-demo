<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    function index(){
        return view('index');
    }
    function shop(){
        $products = Products::all();
        return view('products',compact('products'));
    }
    function viewproduct($id){
        $product = Products::find($id);
        return view('ProductDetails',compact('product'));
    }
}
