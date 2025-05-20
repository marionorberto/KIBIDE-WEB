<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Operations extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'operations';
    public $primaryKey = 'id_operation';


    protected $fillable = [
        'unit_id',
        'service_id',
        'counter_id',
        'name',
        'realization_date',
        'active',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($operation) {
            if (empty($operation->id_operation)) {
                $operation->id_operation = (string) Str::uuid();
            }
        });
    }

    protected $attributes = [
        'active' => true,       // garanti que a campo active receba true como padrão
    ];

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
        return $this->hasMany(Operations::class);
    }
}
