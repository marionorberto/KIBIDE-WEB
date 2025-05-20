<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'tickets';
    public $primaryKey = 'id_ticket';

    protected $fillable = [
        'user_id',
        'unit_id',
        'operation_id',
        'ticket_number',
        'requested_at',
        'called_at',
        'status',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($ticket) {
            if (empty($ticket->id_ticket)) {
                $ticket->id_ticket = (string) Str::uuid();
            }
        });
    }

    // 🔗 Relacionamento com o usuário que solicitou o ticket
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relacionamento com a unidade onde o ticket foi gerado
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // 🔗 Relacionamento com o guichê (mesa) que atendeu o ticket
    public function operation()
    {
        return $this->belongsTo(Counter::class);
    }
}
