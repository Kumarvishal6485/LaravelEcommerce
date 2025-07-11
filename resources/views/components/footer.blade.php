@if (session()->has('msg'))
  <livewire:Alert type="{{session()->get('msg')[1]}}" msg="{{session()->get('msg')[0]}}">
  @php
  session()->forget('msg')
  @endphp
@endif
  
<!-- Footer -->
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
  <x-livewire-alert::scripts />
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
<script src="{{asset('js/index.js')}}"></script>
<x-livewire-alert::flash />
<footer class="text-center text-lg-start bg-light text-muted mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-3 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Ecommerce
            </h6>
            <p>
              An Ecommerce Website , developed for showcasing my Development Skills only.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
             Quick links
            </h6>
            <p>
              <a href="{{url('/')}}" class="text-reset">Home</a>
            </p>
            <p>
              <a href="{{url('/products')}}" class="text-reset">Shop</a>
            </p>
            <p>
              <a href="{{url('/cart')}}" class="text-reset">Cart</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              
            </h6>
            <p>
              <a href="#" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Delhi , INDIA</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              kumarvishal@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright
    </div>
    <!-- Copyright -->
  </footer>
  @livewireScripts
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Footer -->