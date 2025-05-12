<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class CounterService extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'counter_service';
  public $primaryKey = 'id_counter_service';


  protected $fillable = [
    'counter_id',
    'service_id',
  ];

  protected static function booted()
  {
    parent::boot();

    // Gerar UUID automaticamente ao criar o modelo
    static::creating(function ($counter_service) {
      if (empty($counter_service->id_counter_service)) {
        $counter_service->id_counter_service = (string) Str::uuid();
      }
    });
  }
}