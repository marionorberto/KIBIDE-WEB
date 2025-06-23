<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActiveTicketEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $unitId;

    public function __construct($activeTicket, string $unit_id)
    {
        $this->data = $activeTicket->toArray();
        $this->unitId = $unit_id;
    }

    public function broadcastOn()
    {
        return new Channel("active-ticket-{$this->unitId}");
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->data,
        ];
    }
}