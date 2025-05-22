<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Scale extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'scales';
  public $primaryKey = 'id_scale';


  protected $fillable = [
    'unit_id',
    'user_id',
    'day_operation_id',
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($scale) {
      if (empty($scale->id_scale)) {
        $scale->id_scale = (string) Str::uuid();
      }
    });
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class, 'unit_id');
  }

  public function users()
  {
    return $this->hasMany(User::class);
  }
}
