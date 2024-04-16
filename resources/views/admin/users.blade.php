<!DOCTYPE html>
<html lang="en">
<x-header/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="container-fluid">
    <x-admin_header/>
    <div class="row">
      <x-sidebar/>
      <div class="col-lg-10 col-md-10">
        <div class="container-fluid">
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 mt-5">
        <table class="table table-light">
          <tr>
            <th>S.No</th>
            <th>Username</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <?php 
            $i = 0;
          ?>
          @foreach($data as $key)
          <tr>
            <td>{{++$i}}</td>
            <td>{{$key->username}}</td>
            @if($key->active_status == 1)
              <td><a href="{{url('admin/status/'.$key->id.'/1')}}"class="btn btn-success">Active</a></td>
            @elseif($key->active_status==0)
              <td><a href="{{url('admin/status/'.$key->id.'/0')}}" class="btn btn-dark">Deactive</a></td>
            @endif
            <td><a class="btn btn-danger" href="{{url('admin/delete_user/'.$key->id)}}">Delete</a></td>
          </tr>
          @endforeach
        </table>   
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        {{$data->links()}}
      </div>
    </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>