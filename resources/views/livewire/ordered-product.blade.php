<div class="col-lg-6 ordered-products">
    @if($data && $type === "current_order")
        @foreach($data as $product)
            <div class="ordered-product-image">
                <livewire:image :pid="$product->id" :wire:key="$product->id">
            </div>
            <div class="ordered-product-detail">
                <a class="product-link" href="{{url('product/'.$product->id)}}">{{$product->product_name}}</a><br>
                {{$product->price}} ₨<br>
                Quantity : <button class="btn btn-light" disabled>{{$product->quantity}}</button><br>
                <a class="btn btn-warning" href="{{url('support')}}">Get Product Support</a>
                <a class="btn btn-dark" href="{{url('write-review')}}">Write Product Review</a>
            </div>
        @endforeach
    @endif
    @if($data && $type === "all_orders")
        @foreach($data as $product)
        <a href="{{url('orders/'.$product->oid)}}">
            <div class="ordered-product-image">
                <livewire:image :pid="$product->id" :wire:key="$product->id">
            </div>
            <div class="ordered-product-detail">  
                <p><a class="product-link" href="{{url('orders/'.$product->oid)}}">{{$product->product_name}}</a></p>
                <span>{{$product->created_at}}</span>
            </div>
        </a>
        @endforeach
    @endif
</div>