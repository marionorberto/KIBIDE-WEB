<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class DeskCounter extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'desk_counters';
  public $primaryKey = 'id_desk_counter';

  protected $fillable = [
    'unit_id',
    'user_id',
    'counter_id',
    'operation_association_id',
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($desk_counters) {
      if (empty($desk_counters->id_desk_counter)) {
        $desk_counters->id_desk_counter = (string) Str::uuid();
      }
    });
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class, 'unit_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function counter()
  {
    return $this->belongsTo(Counter::class, 'counter_id');
  }

  public function operationAssociation()
  {
    return $this->belongsTo(OperationAssociation::class, 'operation_association_id');
  }
}
