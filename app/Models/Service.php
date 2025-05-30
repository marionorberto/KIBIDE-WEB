<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Service extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'services';
  public $primaryKey = 'id_service';


  protected $fillable = [
    'unit_id',
    'description',
    'prefix_code',
    'priority_level', // normal | uregent
    'active',
  ];

  protected static function booted()
  {
    parent::boot();

    // Gerar UUID automaticamente ao criar o modelo
    static::creating(function ($service) {
      if (empty($service->id_service)) {
        $service->id_service = (string) Str::uuid();
      }
    });
  }

  protected $attributes = [
    'active' => true,       // garanti que a campo active receba true como padrão
  ];

  public function tickets()
  {
    return $this->hasMany(Ticket::class);
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class, 'unit_id');
  }

  public function counters()
  {
    return $this->belongsToMany(Counter::class, 'counter_service', 'service_id', 'counter_id');
  }


  public function operationAssociation()
  {
    return $this->hasMany(OperationAssociation::class);
  }
}
