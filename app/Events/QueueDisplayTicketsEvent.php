<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QueueDisplayTicketsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    public function __construct($data)
    {
        // Garante que os relacionamentos estejam carregados
        $this->data = $data->toArray();
    }

    public function broadcastOn()
    {
        return new Channel('queue-display-tickets-channel');
    }

    public function broadcastWith()
    {
        // Converte para array com relacionamentos inclusos
        return [
            'data' => $this->data,
        ];
    }
}