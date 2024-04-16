<div class="row mt-2 p-4">
    @foreach ($data as $key)
    <div class="col-lg-3 col-md-4 col-sm-12" wire:key="product-{{$key->id}}">
        <div class="card mb-3" style="width: 18rem;">
          <a href="{{url('product/'.$key->id)}}"><livewire:image pid="{{$key->id}}"/></a>
          <div class="card-body">
            <h5 class="card-title">{{$key->product_name}}</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="buy/{{$key->id}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x" id="{{$key->id}}"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2" id="{{$key->id}}"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2" id="{{$key->id}}"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>
