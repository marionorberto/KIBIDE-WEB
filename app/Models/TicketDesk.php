<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class TicketDesk extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'tickets_desk';
    public $primaryKey = 'id_ticket_desk';

    protected $fillable = [
        'unit_id',
        'user_id',
        'ticket_id',
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($tickets_desk) {
            if (empty($tickets_desk->id_ticket_desk)) {
                $tickets_desk->id_ticket_desk = (string) Str::uuid();
            }
        });
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function ticket()
    {
        return $this->belongsTo(TicketGenerated::class, 'ticket_id', 'id_ticket_generated');
    }
}
