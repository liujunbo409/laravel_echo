<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderRemind implements ShouldBroadcast
{
    use SerializesModels;

    public $order;
    public $other_xinxi;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message=$message;
        $this->order = $message['order'];
        $this->other_xinxi='这里有其他信息';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return  ['OrderRemind.'.$this->message['channel']];
    }
}
