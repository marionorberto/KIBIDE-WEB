<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ProfileUser extends Model
{
  use HasFactory, HasUuids;

  protected $keyType = 'string';
  public $incrementing = false;
  public $table = 'profile_user';
  public $primaryKey = 'id_profile_user';


  protected $fillable = [
    'user_id',
    'photo',
    'active',
  ];

  protected static function booted()
  {
    parent::boot();

    // Gerar UUID automaticamente ao criar o modelo
    static::creating(function ($profile_user) {
      if (empty($service->id_profile_user)) {
        $profile_user->id_profile_user = (string) Str::uuid();
      }
    });
  }

  protected $attributes = [
    'active' => true,       // garanti que a campo active receba true como padrão
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
