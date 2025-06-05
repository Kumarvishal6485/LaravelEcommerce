<!DOCTYPE html>
<html lang="en">
<x-header/>
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<meta name="csrf-token" content="{{csrf_token()}}">
<body>
<div class="container-fluid">
    <x-admin_header/>
    <div class="row">
      <x-sidebar/>
      <div class="col-lg-10 col-md-10">
        <div class="container-fluid">
        <div class="row mt-5 mb-3">
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <table class="table table-light">
          <tr>
            <th>S.No</th>
            <th>Order Id</th>
            <th>User Id</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>Created At</th>
          </tr>
          <?php 
            $i = 0;
          ?>
          @foreach($orders as $key)
          <tr>
            <td>{{++$i}}</td>
            <td>{{$key->id}}</td>
            <td>{{$key->uid}}</td>
            <td>{{$key->amount}}</td>
            <td>{{$key->payment_status}}</td>
            <td><livewire:orderstatus status="{{$key->order_status}}" order_id="{{$key->id}}" user_id="{{$key->uid}}" key:id="{{$key->id}}"/></td>
            <td>{{$key->created_at}}</td>
          </tr>
          @endforeach
        </table>   
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        {{$orders->links()}}
      </div>
    </div>
        </div>
      </div>
    </div>
</div>
<script src="{{asset('js/admin.js')}}"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>