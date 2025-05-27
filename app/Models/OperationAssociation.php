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

    static::creating(function ($operation_associations) {
      if (empty($operation_associations->id_operation_association)) {
        $operation_associations->id_operation_association = (string) Str::uuid();
      }
    });
  }

  public function dayOperation()
  {
    return $this->belongsTo(DayOperation::class, 'day_operation_id');
  }

  public function service()
  {
    return $this->belongsTo(Service::class, 'service_id', 'id_service');
  }

  public function counter()
  {
    return $this->belongsTo(Counter::class, 'counter_id', 'id_counter');
  }

  public function tickets()
  {
    return $this->hasMany(TicketGenerated::class);
  }
}
