<!DOCTYPE html>
<html lang="en">
  <x-header/>
  <body>
    <x-navbar />
    <div class="container">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner mycarousel">
        <div class="carousel-item ">
          <img
            src="https://media.istockphoto.com/id/924985612/photo/make-up-artist-is-working-with-face-of-gorgeous-model-cosmetic-manicure-and-make-up.webp?b=1&s=170667a&w=0&k=20&c=qjUMEiSMMhyO9_6z9Z1ddUC30WO3sQIy5IuAqPQ0_-Y="
            class="d-block w-100 c-img" alt="...">
        </div>
        <div class="carousel-item active">
          <img
            src="https://media.istockphoto.com/id/1267038858/photo/black-haired-woman-with-voluminous-shiny-and-curly-hairstyle-frizzy-hair.webp?b=1&s=170667a&w=0&k=20&c=QPdgtGyy9aW7EplArlH8ZTMl3aAQkU6hFfWJbBSS2fI="
            class="d-block w-100 c-img" alt="...">
        </div>
        <div class="carousel-item">
          <img
            src="https://media.istockphoto.com/id/1221548744/photo/a-woman-with-white-hat-walks-down-a-tropical-paradise-beach-with-palm-trees-and-turquoise-sea.webp?b=1&s=170667a&w=0&k=20&c=8CKpdKuiDsUHuHpKozWXX2_XdmWvsdz5fxFPkXMpHUU="
            class="d-block w-100 c-img" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container-fluid">
    <!-- category component  -->
    <!-- <x-category/> -->
    <livewire:category data_type="category" id="0"/>
    <!-- category component -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="product-section-heading">Recently Arrived</h3>
      </div>
    </div>
      <livewire:products/>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h3 class="product-section-heading">Trending Products</h3>
      </div>
    </div>
    <livewire:products orderby="DESC">
  </div>
  <x-footer/>
</body>
</html>