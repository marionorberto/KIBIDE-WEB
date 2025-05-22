<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class QueueTicket extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'queue_tickets';
  public $primaryKey = 'id_ticket_queue';

  protected $fillable = [
    'unit_id',
    'ticket_generated_id',
    'operation_association_id',
    'status',
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($queue_tickets) {
      if (empty($queue_tickets->id_ticket_queue)) {
        $queue_tickets->id_ticket_queue = (string) Str::uuid();
      }
    });
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }
  public function ticket_generated()
  {
    return $this->belongsTo(TicketGenerated::class);
  }

}
