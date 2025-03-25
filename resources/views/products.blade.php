@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>All Products</h1> <hr/>
        <div class="row">
            @foreach ($products as  $product)
                <div class="col-3">
                    <div class="card">
                        <a href="{{url('shop/'.$product->id)}}">
                        <img class="card-img-top" src="{{asset($product->image)}}" alt="{{$product->name}}" height="200px" />     </a> 
                        <div class="card-body">
                            <h4 class="card-title">{{$product->category}}</h4>
                            <p class="card-text">{{$product->name}}</p>
                            <p class="card-text">Price:  <span style="text-decoration: line-through"> &#8377;{{$product->original_price}}</span> &nbsp; &#8377;{{$product->selling_price}}</p>                     
                        </div>
               
                    </div>
                </div>
            @endforeach
    
        </div>
    </div>
@endsection