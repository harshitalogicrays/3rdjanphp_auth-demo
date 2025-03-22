@extends('admin.admin')
@section('content')
<div class="container  shadow p-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Product <a href="{{url('admin/view/product')}}" class="btn btn-primary btn-lg float-end">View</a></h1>
        </div>
        <div class="card-body">
               {{--  <form method="post" enctype="multipart/form-data"
        action="{{url('admin/update/product/'.$product->id)}}"> --}}

            <form method="post" enctype="multipart/form-data"
            action="{{route('updateproduct',['id'=>$product->id])}}">
               
               @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col">
                        <label for="" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="" selected disabled> choose one</option>
                            @foreach ($categories as $cat )
                                <option {{$product->category == $cat ? "selected" :""}}>{{$cat}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name"
                        value="{{$product->name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="" class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand"
                        value="{{$product->brand}}">
                    </div>
                    <div class="mb-3 col">
                        <label for="" class="form-label">Choose Image</label>
                        <input type="file" class="form-control mb-3" name="image">
                        <img src="{{asset($product->image)}}"  height="50px" width="50px"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="" class="form-label">original price</label>
                        <input type="number" class="form-control" name="original_price"
                        value="{{$product->original_price}}">
                        @error('original_price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="" class="form-label">selling price</label>
                        <input type="number" class="form-control" name="selling_price"
                        value="{{$product->selling_price}}">
                        @error('selling_price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="qty"
                        value="{{$product->qty}}">
                        @error('qty')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status : &emsp;</label>
                    <input type="checkbox" name="status" {{$product->status=="0" ? "checked" :""}}>
                </div>
                <button  type="submit"  class="btn btn-primary"> Submit </button>
                
            </form>
        </div>
    </div>
</div>
    
@endsection