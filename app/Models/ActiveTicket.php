<?php

namespace App\Models;

use App\Models\Counter;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class ActiveTicket extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'active_tickets';
    public $primaryKey = 'id_active_ticket';

    protected $fillable = [
        'counter_id',
        'ticket_id',
        'unit_id',
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($activeTicket) {
            if (empty($activeTicket->id_active_ticket)) {
                $activeTicket->id_active_ticket = (string) Str::uuid();
            }
        });
    }

    public function counter()
    {
        return $this->belongsTo(Counter::class, 'counter_id', 'id_counter');
    }

    public function ticket()
    {
        return $this->belongsTo(TicketGenerated::class, 'ticket_id', 'id_ticket_generated');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
}
