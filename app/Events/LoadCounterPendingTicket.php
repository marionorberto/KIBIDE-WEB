<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoadCounterPendingTicket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $operationId;

    public function __construct($data, $operationId)
    {
        $this->data = $data->toArray();
        $this->operationId = $operationId;
    }

    public function broadcastOn()
    {
        return new Channel("counter.{$this->operationId}");
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->data,
        ];
    }
}