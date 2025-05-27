<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use
Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DayOperation extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'day_operations';
  public $primaryKey = 'id_day_operation';


  protected $fillable = [
    'unit_id',
    'name',
    'realization_date',
    'active',
    'start_date',
    'end_date',
    'repeat'
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($day_operations) {
      if (empty($operation->id_day_operation)) {
        $day_operations->id_day_operation = (string) Str::uuid();
      }
    });
  }

  protected $attributes = [
    'active' => true,       // garanti que a campo active receba true como padrão
    'repeat' => false
  ];

  public function unit()
  {
    return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
  }

  public function operationAssociation()
  {
    return $this->hasMany(OperationAssociation::class);
  }
}