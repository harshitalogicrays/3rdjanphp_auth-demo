<div class="row">
    @php
        $totalPrice=0;
    @endphp
    <div class="col-8">
        <div class="table-responsive"  >
            <table class="table table-bordered table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Price</th><th>Quantity</th><th>Total Price</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $k=>$c)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$c->product->name}}
                            <img src="{{$c->product->image}}" height="50px" width="50px"/>
                        </td>
                        <td>&#8377;{{$c->product->selling_price}}</td>
                        <td> <div class="input-group mb-4">
                            <button class="btn btn-primary"
                            wire:click="decreaseQty({{$c->id}})"
                            wire:loading:attr="disabled"
                            >-</button>
                            <input type="number" style="width:40px;text-align:center" 
                            value={{$c->quantity}} readonly/>
                            <button  class="btn btn-primary"
                            wire:click="increaseQty({{$c->id}})"
                            wire:loading:attr="disabled">+</button>
                        </div></td>
                        <td>&#8377;{{$c->product->selling_price * $c->quantity}}
                            @php
                                $totalPrice +=$c->product->selling_price * $c->quantity;
                            @endphp
                        </td>
                        <td><button class="btn btn-danger" wire:click = "removefromcart({{$c->id}})" >
                            <i class="bi bi-trash"></i>
                        </button>
                        </td>
                    </tr>
                    @empty
                        <tr><td colspan="6">No Item in cart</td></tr>
                    @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>
   <div class="col">
        <div class="card px-3 pt-3">
            <h5 class="mb-3">Sub Total: <span class="float-end">&#8377; {{ $totalPrice}}</span></h5>
            <h6 class="mb-3">Shipping: <span class="float-end">&#8377;{{($totalPrice > 0 && $totalPrice<100) ? "50.00" :"0.00"}} </span></h5>
            <hr/>
            <h5 class="mb-3">Total: <span class="float-end">&#8377;{{($totalPrice > 0 && $totalPrice<100) ? $totalPrice+50.00 : $totalPrice}}  </span></h5>
                <hr/>
            <div class="d-flex gap-3 justify-content-between mb-3">
                <button type="button"  class="btn btn-danger btn-lg flex-fill"
                wire:click = "emptycart()">Empty Cart </button>
                <button type="button"  class="btn btn-info btn-lg flex-fill">proceed to checkout </button>
                
            </div>
        </div>
   </div>
    
</div>
