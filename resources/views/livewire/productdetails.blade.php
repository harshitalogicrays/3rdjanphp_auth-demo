<div class="container mt-5 p-3 shadow">
    <div class="row">
        <div class="col">
            <img src="{{asset($product->image)}}" />
        </div>
        <div class="col">
            <h4>{{$product->name}} 
                @if ($product->qty > 0)
                <span class="badge rounded-pill text-bg-success float-end">In stock</span>             
                @else
                <span class="badge rounded-pill text-bg-danger float-end">Out of Stock</span>
                @endif
                
            </h4>
            <h5>Category: {{$product->category}}</h5>
            <p>{{$product->brand}}</p>
            <p>Price : ${{$product->selling_price}}</p>
            <p>{{$product->description}}</p>
            <div class="input-group mb-4">
                <button class="btn btn-primary"
                wire:click="decrementQty">-</button>
                <input type="nmber" style="width:40px;text-align:center" 
                wire:model="qtyCount"
                value={{$this->qtyCount}}>
                <button  class="btn btn-primary"
                wire:click="incrementQty">+</button>
            </div>
            <button  type="button" class="btn btn-primary"  
            wire:click="addToCart({{$product->id}})" >
                Add to Cart
            </button>
            
        </div>
      </div>
</div>