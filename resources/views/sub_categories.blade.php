<!DOCTYPE html>
<html lang="en">
<x-header/>
<body>
  <x-navbar />
  <div class="container-fluid">
    <!-- category component  -->
    <!-- <x-category/> -->
    <livewire:category data_type="sub_category" id="{{Request()->id}}"/>
    <!-- category component -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-4">Recently Arrived</h3>
      </div>
    </div>
    <div class="row mt-2 p-4">
      
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div></a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
      <div class="card mb-3" style="width: 18rem;">
        <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
        <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-4">Trending Products</h3>
      </div>
    </div>
    <div class="row mt-2 p-4">
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card mb-3" style="width: 18rem;">
          <a href="product"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7KzelVDu46w2H1imNY9JQ9jrAQ3iHQ7Peg&usqp=CAU"
            alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">Product title</h5>
            <div class="container">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  ₨ 8999&nbsp;<small><del>₨ 9999</del></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a class="p-2 mb-2 buy-btn" href="{{url('buy')}}">Buy Now</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-eye fa-2x"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="far fa-heart fa-2x mr-2"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <i class="fas fa-cart-plus fa-2x mr-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-footer/>
</body>
</html>