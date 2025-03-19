<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function addp(){
        return view('admin.products.addproduct');
    }
    public function viewp(){
        return view('admin.products.viewproduct');
    }
}
