@extends('layouts.app')
@section('content')
<div class="container mt-5 shadow p-3">
    <a class="btn btn-primary"   href="{{url('/myorders')}}" >Back to Orders</a
>

<div class="row ">
   
    
    <div class="col-6 p-2">
       <h2> Order Details</h2>
       <hr/>
       <p>Order Id: {{$order->id}}</p>
       <p>Tracking Id/No: {{$order->tracking_no}}</p>
       <p>Ordered Date: {{$order->created_at}}</p>
       <p>Payment Mode: {{$order->payment_mode}}</p>     
        @if ($order->status_message !='delivered')
        <p class="text-danger p-3 border">Order Status Message: {{$order->status_message}}</p>
       @else
       <p class="text-success p-3 border">Order Status Message: {{$order->status_message}}</p>
      
   @endif 

    </div>
    <div class="col-6 p-2">
        <h2> User Details</h2><hr>
        <p>Fullname: {{$order->fullname}}</p>
        <p>Phone: {{$order->phone}}</p>
        <p>Email: {{$order->email}}</p>
        <p>Address: {{$order->address}}</p>
        <p>Pincode : {{$order->pincode}}</p>
    </div>
</div>
<div class="row shadow mt-4">
    <h1>Order Items</h1>
    <hr/>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPrice=0;
                @endphp
                @forelse ($order->orderItems as $orderItem)
                <tr class="">
                    <td>{{$orderItem->id}}</td>
                    <td>
           <img src="{{asset($orderItem->product->image)}}" alt="{{$orderItem->product->name}}" style="width: 50px; height: 50px" > 
                         
                    </td>
                    <td>{{$orderItem->product->name}}</td>
                    <td>{{$orderItem->price}}</td>
                    <td>{{$orderItem->quantity}}</td>
                    <td>{{$orderItem->price * $orderItem->quantity}}
                    @php
                        $totalPrice += $orderItem->price * $orderItem->quantity
                    @endphp
                    </td>
                </tr>
                @empty
                    <tr><td colspan="6">No Order Item Found</td></tr>
                @endforelse
                <tr>
                    <td colspan="5" class="fw-bold">Total Amount:</td>
                    <td colspan="1" class="fw-bold">{{$totalPrice}}</td>
                </tr>
            </tbody>
        </table>
        </div>
</div>
</div>
@endsection