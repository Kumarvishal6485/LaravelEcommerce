<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('msg-received.{receiver_id}', function ($admin, $receiver_id) {
    if (!$admin) {
        \Log::error('Broadcast auth failed: user is null');
        return false;
    }
    return $admin == $receiver_id;
});

Broadcast::channel('order-status-change.{receiver_id}', function ($admin, $receiver_id) {
    if (!$admin) {
        \Log::error('Broadcast auth failed: user is null');
        return false;
    }
    return $admin == $receiver_id;
});