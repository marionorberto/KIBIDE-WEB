<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ScaleUser extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'scale_users';
  public $primaryKey = 'id_scale_user';

  protected $fillable = [
    'unit_id',
    'scale_id',
    'user_id',
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($scale_users) {
      if (empty($scale_users->id_scale_user)) {
        $scale_users->id_scale_user = (string) Str::uuid();
      }
    });
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class, 'unit_id');
  }

  public function scale()
  {
    return $this->belongsTo(Scale::class, 'scale_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
