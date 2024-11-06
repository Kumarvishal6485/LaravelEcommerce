<div>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid ">
    <a class="navbar-brand" href="/">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{url('products')}}">Shop</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{url('cart')}}">Cart</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{url('order')}}">Orders</a>  
        </li>
        @if(session()->has('username'))
          <li><a class="nav-link active" aria-current="page" href="{{url('logout')}}">Logout</a></li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" >Login</button></li>
              <li><a class="dropdown-item" href="#">Signup</a></li>
            </ul>
          @endif
        </li>
      </ul>
        <livewire:Search search=""/>
    </div>
  </div>
</nav>
</div>

<!-- login modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="check_users" method="post">
            {{@csrf_field()}}
            <table class="login">
                <tr>
                    <td id="login_heading">Login</td>
                </tr>
                <tr>
                    <td><center><input type="email" name="username" placeholder="Enter Email" required autocomplete="off"></center></td>
                </tr>
                <tr>
                    <td><center><input type="password" name="password" placeholder="Enter Password" required autocomplete="off"></center></td>
                </tr>
                <tr>
                    <td><center><input type="submit" value="Login"></center></td>
                </tr>
                <tr><td><center>or</center></td></tr>
                <tr>
                  <td><center><a href="/googlelogin"><img src="{{asset('storage/googlelogin.png')}}" class="w-50"></a></center></td>
                </tr>
            </table>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- login modal -->