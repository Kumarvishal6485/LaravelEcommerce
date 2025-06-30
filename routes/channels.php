<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('msg-received.{receiver_id}', function ($admin, $receiver_id) {
    return $admin->id == $receiver_id;
});

Broadcast::channel('order-status-change.{receiver_id}', function ($admin, $receiver_id) {
    return $admin->id == $receiver_id;
});