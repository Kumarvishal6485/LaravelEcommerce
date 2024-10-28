<div class="row mt-2">
  <div class="col-lg-8 col-md-12 col-sm-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Product</th>
          <th scope="col">Price</th>
          <th scope="col" colspan="2">Quantity</th>
        </tr>
      </thead>
      <tbody>
        @if($data != NULL && count($data))
        <?php $i=0;?>
        @php
        $product_name = array();
        $quantity = array();
        $price = array();
        @endphp
        @foreach($data as $product)
        @php
        $product_name[$product->id] = $product->product_name;
        $price[$product->id] = $product->price;
        @endphp
        <tr>
          @if(session()->has('user_id'))
          @php
          $quantity[$product->id] = $product->quantity;
          @endphp
          <th>
            <input class="form-check-input" type="checkbox" wire:key="{{$product->id}}" checked>
            &nbsp;{{++$i}}
          </th>
          <td><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></td>
          @elseif(session()->has('cart'))
          <th>
            <input class="form-check-input" type="checkbox" wire:key="{{$product->id}}" checked>
            &nbsp;{{++$i}}
          </th>
          <td><a href="{{url('/product/'.$product->id)}}">{{$product->product_name}}</a></td>
          @endif
          <td>₨&nbsp;{{$product->price}}</td>
          @if(session()->has('user_id'))
          <td>
            <div class="quantity" wire:key="{{$product->id}}">
              <span class="minus" wire:click="dec_quantity({{$product->id}},{{$product->quantity}})">-</span>
              <span class="num">{{$product->quantity}}</span>
              <span class="plus" wire:click="inc_quantity({{$product->id}},{{$product->quantity}})">+</span>
            </div>
          </td>
          <td><a wire:click.prevent="remove_product({{$product->id}})"><i class="fa fa-trash"></i></a></td>
          @elseif(session()->has('cart'))
            @php
              $quantity[$product->id] = $cart[$product->id];
            @endphp
          <td>
            <div class="quantity" wire:key="$product->id" >
              <span class="minus" wire:click="dec_quantity({{$product->id}},<?php echo $cart[$product->id]?>)">-</span>
              <span class="num">{{$cart[$product->id]}}</span>
              <span class="plus" wire:click="inc_quantity({{$product->id}},<?php echo $cart[$product->id]?>)">+</span>
            </div>
          </td>
          <td><a wire:click.prevent="remove_product({{$product->id}})"><i class="fa fa-trash"></i></a></td>
          @endif
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="4">
            <center>Cart is Empty</center>
          </td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>

  <div class="col-lg-4 col-md-12 col-sm-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Summary</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $total = 0;
        ?>
        @if($data != NULL && count($data))
        @foreach($product_name as $key => $value)
        @php
        $total = $total + ($price[$key] * $quantity[$key]);
        @endphp
        <tr>
          <td>{{$value}} &nbsp; <span>{{$price[$key]}} * {{$quantity[$key]}}</span></td>
        </tr>
        @endforeach
        @endif
        <tr>
          <?php
            Request()->session()->put('amount',$total);
          ?>
          <td>Total <span>{{$total}}</span></td>
        </tr>
        <tr>
          <td>
              @if($total != 0)
                <a class="btn btn-success w-100" href="{{url('checkout')}}">Checkout</a>
              @else
                <a class="btn btn-success w-100">Checkout</a>
              @endif
            </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>