<!DOCTYPE html>
<html lang="en">
<x-header />
<style>
  #filter-data{
    display : none !important;
  }
</style>
<body>
  <x-navbar />
  <div class="container-fluid">
    <div class="row productcarousel">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
          <!-- Carousel wrapper -->
          <div id="carouselDarkVariant" class="carousel product_carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel">
            <!-- Inner -->
            <div class="carousel-inner">
              <!-- Single item -->
              @for($i=0; $i<count($images); $i++)
              <div class="carousel-item <?php if($i==0) echo 'active';?>">
                <img src="{{asset('storage/products/'.$images[$i])}}" class="d-block w-100"
                  alt="Motorbike Smoke" />
              </div>
              @endfor
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant"
              data-mdb-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <!-- <span class="visually-hidden">Previous</span> -->
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant"
              data-mdb-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <!-- <span class="visually-hidden">Next</span> -->
            </button>
          </div>
          <!-- Carousel wrapper -->
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h2>{{$data[0]->product_name}}</h2>
        <h4 class="mt-4">₨ {{$data[0]->price}}&nbsp;<del>₨ {{$data[0]->cost}} </del></h4>
        <div class="container options mt-4">
        <i class="far fa-heart fa-2x" onclick="add_to_wishlist({{$data[0]->id}})" ></i>
        <i class="fas fa-cart-plus fa-2x" onclick="add_to_cart({{$data[0]->id}})" ></i>
        <a href="{{asset('buy/'.$data[0]->id)}}" class="p-2 buy-btn">Buy Now</a>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Description
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  {{$data[0]->description}}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Reviews
              </button>
            </h2>
            <livewire:review pid="{{Request()->pid}}"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-4">Similar Products</h3>
      </div>
    </div>
    <livewire:products sid="{{$data[0]->sid}}" cid="{{$data[0]->cid}}"/>
  </div>
  <x-footer/>
  @livewire('Filters')
  <script>
       function add_to_wishlist(data){
          Livewire.dispatch('add_to_wishlist',[data]);
       }
       function add_to_cart(data){
          Livewire.dispatch('add_to_cart',[data]);
       }
  </script>
</body>
</html>