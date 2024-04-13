<!DOCTYPE html>
<html lang="en">
<x-header />
<style>
  .carousel {
    height: 350px;
  }
  .options{
    display : flex;
    flex-direction : row;
    flex-wrap : wrap;
    margin-bottom : 1rem;
    gap : 4px 40px;
  }
</style>

<body>
  <x-navbar />
  <div class="container-fluid">
    <div class="row m-5">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
          <!-- Carousel wrapper -->
          <div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel">
            <!-- Inner -->
            <div class="carousel-inner">
              <!-- Single item -->
              <div class="carousel-item active">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(19).webp" class="d-block w-100"
                  alt="Motorbike Smoke" />
              </div>

              <!-- Single item -->
              <div class="carousel-item">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(35).webp" class="d-block w-100"
                  alt="Mountaintop" />
              </div>

              <!-- Single item -->
              <div class="carousel-item">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(40).webp" class="d-block w-100"
                  alt="Woman Reading a Book" />
              </div>
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
        <h2>Product Title to be given here</h2>
        <h4 class="mt-4">₨ 8999&nbsp;<del>₨ 9999 </del></h4>
        <div class="container options mt-4">
        <i class="far fa-heart fa-2x"></i>
        <i class="fas fa-cart-plus fa-2x"></i>
        <a href="buy" class="p-2 buy-btn">Buy Now</a>
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
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse
                plugin adds the appropriate classes that we use to style each element. These classes control the overall
                appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go
                within the <code>.accordion-body</code>, though the transition does limit overflow.
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
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse
                plugin adds the appropriate classes that we use to style each element. These classes control the overall
                appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go
                within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-4">Similar Products</h3>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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
                  <a class="p-2 buy-btn" href="buy">Buy Now</a>
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