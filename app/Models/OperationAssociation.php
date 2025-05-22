<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OperationAssociation extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'operation_associations';
  public $primaryKey = 'id_operation_association';


  protected $fillable = [
    'unit_id',
    'day_operation_id',
    'service_id',
    'counter_id',
  ];

  protected static function booted()
  {
    parent::boot();

    // Gerar UUID automaticamente ao criar o modelo
    static::creating(function ($operation_associations) {
      if (empty($operation->id_operation)) {
        $operation_associations->id_operation = (string) Str::uuid();
      }
    });
  }

  protected $attributes = [
    'active' => true,       // garanti que a campo active receba true como padrão
  ];

  public function dayOperation()
  {
    return $this->hasMany(OperationAssociation::class);
  }

  public function service()
  {
    return $this->belongsTo(Service::class, 'service_id', 'id_service');
  }

  public function counter()
  {
    return $this->belongsTo(Counter::class, 'counter_id', 'id_counter');
  }
}
