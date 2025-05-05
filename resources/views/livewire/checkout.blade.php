<div class="container mt-5">
    <form wire:submit.prevent="submitOrder" class = "checkout-form">
        <div class="row mt-5"> 
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" wire:model.live="name" name="name" placeholder="Ex John Doe">
                @error('name')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="mail">Mail</label>
                <input class="form-control" type="text" wire:model.live="email" name="email" placeholder="johndoe@gmail.com">
                @error('email')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="phone">Phone No.</label>
                <input class="form-control" type="tel" wire:model.live="phone" name="phone" placeholder="9-876543210">
                @error('phone')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="alternate_phone">Alternate Phone No.</label>
                <input class="form-control" type="tel" wire:model.live="alternate_phone" name="alternate_phone" placeholder="9-876543210">
                @error('alternate_phone')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="house_no">House No.</label>
                <input class="form-control" wire:model.live="house_no" type="number" name="house_no" placeholder="000">
                @error('house_no')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="street">Street</label>
                <input class="form-control" type="text" wire:model.live="street" name="street" placeholder="Kalkaji">
                @error('street')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="state">State</label>
                <input class="form-control" type="text" wire:model.live="state" name="state" placeholder="Delhi">
                @error('state')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="city">City</label>
                <input class="form-control" type="text" wire:model.live="city" name="city" placeholder="New Delhi">
                @error('city')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="country">Country</label>
                <input class="form-control" type="text" wire:model.live="country" name="country" placeholder="India">
                @error('country')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="pincode">Pincode</label>
                <input class="form-control" type="number" wire:model.live="pincode" name="pincode" placeholder="110019">
                @error('pincode')
                    <span class="error-msg">**{{$message}}**</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <center>
                    <button type="submit" class="p-2 buy-btn">Order Now</button>
                </center>    
            </div>
        </div>
    </form>
</div>
