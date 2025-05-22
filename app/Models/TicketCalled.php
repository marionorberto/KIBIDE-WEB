<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class TicketCalled extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'tickets_called';
  public $primaryKey = 'id_ticket_called';

  protected $fillable = [
    'unit_id',
    'user_id',
    'ticket_id',
    'called_at',
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($tickets_called) {
      if (empty($tickets_called->id_ticket_called)) {
        $tickets_called->id_ticket_called = (string) Str::uuid();
      }
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class);
  }
}
