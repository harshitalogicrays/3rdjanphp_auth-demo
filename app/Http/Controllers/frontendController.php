<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    function index(){
        return view('index');
    }
    function shop(Request $request){
        $search = $request->search;
        if($search !=''){
            $products = Products::where('name','like',"%$search%")->get();
            return view('products',compact('products'));
        }
        else {
            $products = Products::all();
            return view('products',compact('products'));
        }      
    }
    function viewproduct($id){
        $product = Products::find($id);
        return view('ProductDetails',compact('product'));
    }
    function myorders(){
        $orders = Orders::where('user_id',auth()->user()->id)->paginate(3);    
        return view('myorders',compact('orders'));    
    }
    function myorderdetails($id){
        $order = Orders::where('user_id',auth()->user()->id)->where('id',$id)->first();    
        return view('myorderdetails',compact('order'));   
    }
}
