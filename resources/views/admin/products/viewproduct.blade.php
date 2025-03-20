@extends('admin.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    {{ session('message') }}
</div>
@endif
       <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">View Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> <th>Category</th>
                                            <th>Name</th>
                                           <th>Image</th>
                                            <th>Selling Price</th>
                                            <th>Original Price</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{$product->category}}</td>
                                                <td>{{$product->name}} </td>
                                                <td><img src={{asset($product->image)}} height="50px" width="50px"/></td>
                                                <td>&#8377; {{$product->selling_price}}</td>
                                                <td>&#8377; {{$product->original_price}}</td>
                                                <td>{{$product->qty}}</td>
                                                <td>@if ($product->status=="0")
                                                        <span class="badge rounded-pill text-bg-success" >Available</span> 
                                                @else
                                                <span class="badge rounded-pill text-bg-danger" >Not Available</span> 
                                                    
                                                @endif</td>
                                                
                                                <td>
                                                    <button  type="button" class="btn btn-success"  >
                                                        <i class="bi bi-pen"></i>
                                                    </button>
                                                    <a href="{{url('/admin/delete/product/'.$product->id)}}" 
                                                    onclick="return window.confirm('are you sure to delete this??')" type="button" class="btn btn-danger"  >
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="8">No Product Found</td></tr>
                                        @endforelse
                                       
                                    </tbody>
                                 
                                </table>
                            </div>
                        </div>
                    </div>
@endsection