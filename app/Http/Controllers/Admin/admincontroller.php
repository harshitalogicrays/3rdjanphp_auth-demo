<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $product = Products::find($id);
        if(File::exists($product->image)){
            File::delete($product->image);
        }
        $product->delete();
        return redirect('/admin/view/product')->with('message','product deleted');

    }

    public function editp($id){
        $categories = ["groceries","furniture","electronics","jewellary","cloths"];
        $product = Products::find($id);
        return view('admin.products.editproduct',compact('categories','product'));
    }

    function updatep($id, Request $request){
        $product = Products::find($id);

        $validated =  $request->validate([
            "category"=>'required',
            "name"=>"required", "selling_price"=>"required",
            "original_price"=>"required",    "qty"=>"required" ]);

        $file =  $request->file("image");  
        if($request->hasFile("image")){
            if(File::exists($product->image)){
                File::delete($product->image);
            }
            $filename = time()."ecommerce.".$file->getClientOriginalExtension();
            $file->move('uploads',$filename);
            $finalpath =  "uploads/".$filename; }

        $product->update([
            'category'=>$validated['category'],
            'name'=>$validated['name'],
            "selling_price"=>$validated['selling_price'],
            "original_price"=>$validated['original_price'],
            "qty"=>$validated['qty'],
            "brand"=>$request->brand,
            "description"=>$request->description,
            "status"=>$request->status==true?'0':'1',
            "image"=> $request->hasFile("image") ? $finalpath : $product->image
        ]);
        return redirect('/admin/view/product')->with('message','product added');
    }

    function displayorders(){
        $orders = Orders::paginate(3);
        return view('admin.order',compact('orders'));
    }
    function vieworder($id){
        $order = Orders::find($id);
        return view('admin.vieworder',compact('order'));

    }
    function updateorder($id , Request $request){
        $order = Orders::where('id',$id);
        $order->update([ 'status_message'=>$request->status]);
        return redirect('/admin/orders')->with('message','order updated');
    }
}
