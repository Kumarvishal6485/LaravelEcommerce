<div class="container mt-5">
    <form wire:submit.prevent="submitOrder" class = "checkout-form">
        <div class="row mt-5"> 
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="name">Name</label>
                <input class="form-control" type="text" wire:model="name" name="name" placeholder="Ex John Doe"  Required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="mail">Mail</label>
                <input class="form-control" type="email" wire:model="email" name="email" placeholder="johndoe@gmail.com"  Required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="phone">Phone No.</label>
                <input class="form-control" type="tel" wire:model="phone" name="phone" placeholder="9-876543210" pattern="[6-9]{1}[0-9]{9}"  Required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="alternate_phone">Alternate Phone No.</label>
                <input class="form-control" type="tel" wire:model="alternate_phone" name="alternate_phone" placeholder="9-876543210" pattern="[6-9]{1}[0-9]{9}">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="house_no">House No.</label>
                <input class="form-control" wire:model="house_no" type="number" name="house_no" placeholder="000"  Required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="street">Street</label>
                <input class="form-control" type="text" wire:model="street" name="street" placeholder="Kalkaji"  Required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="state">State</label>
                <input class="form-control" type="text" wire:model="state" name="state" placeholder="Delhi"  Required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="city">City</label>
                <input class="form-control" type="text" wire:model="city" name="city" placeholder="New Delhi"  Required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="country">Country</label>
                <input class="form-control" type="text" wire:model="country" name="country" placeholder="India"  Required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="pincode">Pincode</label>
                <input class="form-control" type="number" wire:model="pincode" name="pincode" placeholder="110019"  Required>
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
