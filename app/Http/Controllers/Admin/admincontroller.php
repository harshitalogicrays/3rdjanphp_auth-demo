<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class admincontroller extends Controller
{
    public function index(){
    
        return view('admin.dashboard');
    }
    public function addp(){
        $categories = ["groceries","furniture","electronics","jewellary","cloths"];
        return view('admin.products.addproduct',compact('categories'));
    }
    public function viewp(){
        $products =  Products::all();
        return view('admin.products.viewproduct',compact('products'));
    }
    public function store(Request $request){
        // dd($request->all());
       $validated =  $request->validate([
            "category"=>'required',
            "name"=>"required", "selling_price"=>"required",
            "original_price"=>"required",    "qty"=>"required" ]);
        $file =  $request->file("image");  
        if($request->hasFile("image")){
            $filename = time()."ecommerce.".$file->getClientOriginalExtension();
            $file->move('uploads',$filename);
            $finalpath =  "uploads/".$filename; }

        $products =  Products::create([
            'category'=>$validated['category'],
            'name'=>$validated['name'],
            "selling_price"=>$validated['selling_price'],
            "original_price"=>$validated['original_price'],
            "qty"=>$validated['qty'],
            "brand"=>$request->brand,
            "description"=>$request->description,
            "status"=>$request->status==true?'0':'1',
            "image"=> $finalpath
        ]);
        return redirect('/admin/view/product')->with('message','product added');
    }

    function deletep($id){
        $product = Products::where('id',$id);
        $product->delete();
        return redirect('/admin/view/product')->with('message','product deleted');

    }
}
