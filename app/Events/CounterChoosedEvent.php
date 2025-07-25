<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CounterChoosedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $idOperation;

    public function __construct($data, $idOperation)
    {
        $this->data = $data;
        $this->idOperation = $idOperation;
    }

    public function broadcastOn()
    {
        return new Channel("counter-choosed-channel.{$this->idOperation}");
    }

    public function broadcastWith()
    {
        // data triggered!
        return [
            'data' => $this->data,
        ];
    }
}