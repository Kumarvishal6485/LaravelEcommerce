<div class="dropdown">
    <i class="fa-solid fa-bell " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if ($count != 0)
            <span id="notification-count">{{$count}}</span>
        @endif
    </i>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($notifications as $notification)
            <a class="dropdown-item" href="{{url('orders/'.$notification['order_id'])}}">
                @if ($notification['message'] != 'Order Placed')
                    Your order have been {{$notification['message']}} Successfully
                @else 
                    {{$notification['message']}} Successfully
                @endif
                </a>
        @endforeach
    </div>
</div>