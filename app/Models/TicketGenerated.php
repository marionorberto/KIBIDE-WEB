<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class TicketGenerated extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'ticket_generated';
  public $primaryKey = 'id_ticket_generated';

  protected $fillable = [
    'unit_id',
    'operation_association_id',
    'ticket_number',
    'called_at',
    'status',
  ];

  protected static function booted()
  {
    parent::boot();

    // Gerar UUID automaticamente ao criar o modelo
    static::creating(function ($ticket_generated) {
      if (empty($ticket_generated->id_ticket_generated)) {
        $ticket_generated->id_ticket_generated = (string) Str::uuid();
      }
    });
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }

  public function operationAssociation()
  {
    return $this->belongsTo(OperationAssociation::class, 'operation_association_id');
  }
}
