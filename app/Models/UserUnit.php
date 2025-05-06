<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserUnit extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'user_unis';
    public $primaryKey = 'id_user_unit';


    protected $fillable = [
        'user_id',
        'company_id',
        'unit_id',
        'active',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($userUnit) {
            if (empty($userUnit->id_user_unit)) {
                $userUnit->id_user_unit = (string) Str::uuid();
            }
        });
    }

    protected $attributes = [
        'active' => true,       // garanti que a campo active receba true como padrão
    ];
}
