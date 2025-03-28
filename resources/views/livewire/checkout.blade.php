<div class="py-3 py-md-4 checkout">
    <div class="container">
        <h4>Checkout</h4>
        <hr>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Item Total Amount :
                        <span class="float-end">${{$totalAmount}}</span>
                    </h4>
                    <hr>
                    <small>* Items will be delivered in 3 - 5 days.</small>
                    <br/>
                    <small>* Tax and other charges are included ?</small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Basic Information
                    </h4>
                    <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" wire:model="fullname" placeholder="Enter Full Name" />
                                @error('fullname')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" name="phone" id="phone" wire:model="phone" class="form-control" placeholder="Enter Phone Number" />
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" wire:model="email" id="email"  readonly class="form-control" placeholder="Enter Email Address" />
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" name="pincode"  wire:model="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" />
                                @error('pincode')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea name="address" wire:model="address" class="form-control" id="address" rows="2"></textarea>
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary"
                                wire:click="placeorder"> Place Order</button>
                                
                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
</div>  