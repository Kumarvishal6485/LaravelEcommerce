<!DOCTYPE html>
<html lang="en">
  <x-header/>
  <body>
    <x-navbar />
    <div class="container pt-5">
        @if(count($data) == 0 && !isset($uid) && !isset($oid))
          <center class="mt-5">
              <h1>No Order Placed Till Now</h1>
          </center>
        @else
          <div class="row order-container">
              @if(isset($oid))
              <livewire:ordered-product oid="{{$oid}}"/>
                @if (count($data)) 
                  <div class="col-lg-6 order-details">
                    <!-- Order Details -->
                    <h4>Order Details</h4>
                    Amount : {{$data[0]->amount}}<br>
                    Reference_id : {{$data[0]->reference_id}}<br>
                    Payment Date and Time : {{$data[0]->gateway_created_time}}
                    <!-- Delivery Details -->
                    <h4 class="pt-2">Delivery Details</h4>
                    {{$data[0]->name}}<br>
                    @if($data[0]->phone === $data[0]->alternate_phone)
                    {{$data[0]->phone}}<br>
                    @else
                    {{$data[0]->phone}} , {{$data[0]->alternate_phone}}<br>
                    @endif
                    {{$data[0]->house_no}} , {{$data[0]->street}}<br>
                    {{$data[0]->city}}  , {{$data[0]->state}} <br>
                    {{$data[0]->country}} , {{$data[0]->pincode}} 
                  </div>
                @endif
              @elseif (isset($uid))
              <livewire:ordered-product/>
              @endif
          </div>
        @endif
    </div>
  <x-footer/>
</body>
</html>