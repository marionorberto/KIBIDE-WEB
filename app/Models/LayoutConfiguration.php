<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class LayoutConfiguration extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'layout_configurations';
  public $primaryKey = 'id_user_layout_configuration';

  protected $fillable = [
    'unit_id',
    'user_id',
    'theme_mode',
    'theme_color',
    'layout_width',
    'font_family',
    'layout_direction',
  ];

  protected static function booted()
  {
    parent::boot();

    static::creating(function ($layout_configurations) {
      if (empty($layout_configurations->id_user_layout_configuration)) {
        $layout_configurations->id_user_layout_configuration = (string) Str::uuid();
      }
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'id_user');
  }

  public function unit()
  {
    return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
  }
}
