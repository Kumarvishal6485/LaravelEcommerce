<div class="row" id="filter-data">
  <div class="col-lg-2 col-md-12 border mt-3 p-2" id="filter-button">
    <a class="btn btn-dark">Filter By</a>
  </div>
  <div class="col-lg-2 col-md-12 border mt-3 p-2 filters">
    <center id="filter-by-text"><h4>Filter By</h4></center>
    <div>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button">
              Category
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <form>
                @foreach ($categories as $category)
                <input type="radio" value="{{ $category->id }}" wire:model.live="category" name="category">
                  {{$category->category}} <br>
                @endforeach
              </form>
            </div>
          </div>
        </div>
      </div>
      @foreach ($attributes as $attribute)
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{$attribute->id}}">
                <button class="accordion-button @if($openAccordion != $attribute->id) collapsed @endif" 
                    type="button" data-bs-toggle="collapse" 
                    data-bs-target="#collapse{{$attribute->id}}"
                    aria-expanded="{{ $openAccordion == $attribute->id ? 'true' : 'false' }}"
                    aria-controls="collapse{{$attribute->id}}"
                    wire:click="getvalues({{$attribute->id}})" wire:key="{{$attribute->id}}">
                    {{ ucfirst($attribute->attribute) }}
                </button>
            </h2>
            <div id="collapse{{$attribute->id}}" 
                class="accordion-collapse collapse @if($openAccordion == $attribute->id) show @endif"
                aria-labelledby="heading{{$attribute->id}}"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form>
                        @foreach($values as $val)
                            <input type="radio" value_id="{{$attribute->id}}/{{$val->id}}" wire:click="attribute_value_product('{{$attribute->id}}/{{$val->id}}')" name="{{$attribute->attribute}}"> 
                            {{$val->value}} <br> 
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
  @endforeach
    </div>
  </div>
  <!-- Shop Sidebar End -->
  <!-- Shop Product Start -->
  <div class="col-lg-10 col-md-12">
    <div class="row pt-4 products-row">
      <div class="row ">
        @if(count($data))
        @foreach ($data as $key)
        <div class="col-lg-4 col-md-4 col-sm-12" wire:ignore wire:key="product-{{$key->id}}">
          <div class="card product-card">
            <a href="{{url('product/'.$key->id)}}">
              <livewire:image :pid="$key->id" :wire:key="$key->id">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{$key->product_name}}</h5>
              <div class="container product-operations-btn">
                <div class="row mb-3">
                  <div class="col-lg-7 col-md-7 col-sm-7">
                    ₨ {{$key->price}}&nbsp;<small><del>₨ {{$key->cost}}</del></small>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5">
                    <a class="p-2 mb-2 buy-btn" href="{{url('buy/'.$key->id)}}">Buy Now</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <i class="far fa-eye fa-2x" id="{{$key->id}}"></i>
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
        @else
          <h1>No Product Available for the selected category</h1>
        @endif
      </div>
    </div>
  </div>
  <!-- Shop Product End -->
</div>