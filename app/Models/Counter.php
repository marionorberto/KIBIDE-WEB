<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Counter extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'counters';
    public $primaryKey = 'id_counter';


    protected $fillable = [
        'unit_id',
        'service_id',
        'counter_name',
        'status',
        'active',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($counter) {
            if (empty($counter->id_counter)) {
                $counter->id_counter = (string) Str::uuid();
            }
        });
    }

    protected $attributes = [
        'active' => true,       // garanti que a campo active receba true como padrão
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'counter_service', 'counter_id', 'service_id');
    }

    public function operations()
    {
        return $this->hasMany(Operations::class);
    }

    public function operationAssociations()
    {
        return $this->hasMany(OperationAssociation::class);
    }
}