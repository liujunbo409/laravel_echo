<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderRemind implements ShouldBroadcast
{
    use SerializesModels;

    public $order;
    public $other_xinxi;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {

        $this->order = $order;
        $this->other_xinxi='这里有其他信息';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return  ['OrderRemind.'.'1'];
//        return  new PrivateChannel('OrderRemind');
    }
}
