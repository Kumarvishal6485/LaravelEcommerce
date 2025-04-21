<div class="row products-row">
  @foreach ($data as $key)
    <div class="col-lg-3 col-md-4 col-sm-12" wire:ignore wire:key="product-{{$key->id}}">
        <div class="card product-card">
            <a href="{{url('product/'.$key->id)}}" wire:navigate><livewire:image :pid="$key->id" :wire:key="$key->id"></a>
          <div class="card-body">
            <h5 class="card-title">{{$key->product_name}}</h5>
            <div class="container product-operations-btn">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-4">
                  ₨ {{$key->price}}&nbsp;<small><del>₨ {{$key->cost}}</del></small>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-8">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy/'.$key->id)}}" wire:navigate>Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"  id="{{$key->id}}"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2" wire:click.prevent="add_to_wishlist({{$key->id}})"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2" wire:click.prevent="add_to_cart({{$key->id}})"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>