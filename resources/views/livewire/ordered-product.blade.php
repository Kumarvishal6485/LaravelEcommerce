@if (count($data))
    @if ($data && $type === 'current_order')
        <div class="col-lg-6 ordered-products">
            <div class="row">
                <div class="col-lg-11 col-md-11">
                </div>
                <div class="col-lg-1 col-md-1 p-1">
                    <div class="dropdown">
                      <button class="btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                        &#8942;
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="get-support" order_id="{{ $order_id }}">Get Product Support</a></li>
                        <li><a class="dropdown-item" href="{{ url('write-review') }}">Write Product Review</a></li>
                      </ul>
                    </div>
                </div>
            </div>
            @php
                $items = count($data);
                $iteration = 0;
            @endphp
            @foreach ($data as $product)
                <div class="row">
                    <div class="col-lg-12 col-md-12 order-specific">
                        <div class="ordered-product-image">
                            <livewire:image :pid="$product->id" :wire:key="$product->id">
                        </div>
                        <div class="ordered-product-detail">
                            <a class="product-link" href="{{ url('product/' . $product->id) }}">{{ $product->product_name }}</a><br>
                            {{ $product->price }} ₨<br>
                            Quantity : <button class="btn btn-light" disabled>{{ $product->quantity }}</button><br>
                        </div>
                    </div>
                    @if ($items - 1 == $iteration)
                        <div class="order-status">
                            <livewire:status-button order_status="{{$product->order_status}}"/>
                        </div>
                    @endif
                    @php
                        $iteration++;
                    @endphp
                </div>
            @endforeach
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <livewire:chat order_id="{{ $order_id }}"/>
                </div>
            </div>
        </div>
    @endif

    @if ($data && $type === 'all_orders')
        <div class="col-lg-12 col-md-12 ordered-products">
            <div class="container order-all">
                @foreach ($data as $product)
                    <div class="row">
                        <div class="col-lg-12 col-md-12 order-specific">
                            <a href="{{ url('orders/' . $product->oid) }}">
                                <div class="ordered-product-image">
                                    <livewire:image :pid="$product->id" :wire:key="$product->id">
                                </div>
                                <div class="ordered-product-detail">
                                    <p><a class="product-link"
                                            href="{{ url('orders/' . $product->oid) }}">{{ $product->product_name }}</a>
                                    </p>
                                    <span>{{ $product->created_at }}</span>
                                    <livewire:status-button order_status="{{$product->order_status}}"/>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@else
    <div>
        <h3>Order Fetch Request Failed! Try Again Later.</h3>
    </div>
@endif
