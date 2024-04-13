<div class="row p-2 nav-bar">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <span class="p-3"><i class="header-text">Admin</i></span>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-4"></div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                @if(session()->has('username'))
                    <a href="{{url('admin/logout')}}" class="btn btn-success">Logout</a>
                @else
                    <a href="{{url('login')}}" class="btn btn-success">Login</a>
                @endif
            </div>
        </div>