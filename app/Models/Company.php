<?php

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($company) {
            if (empty($company->id_company)) {
                $company->id_company = (string) Str::uuid();
            }
        });
    }

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'company_id', 'id_company');
    // }

    // public function counters()
    // {
    //     return $this->hasMany(Counter::class, 'company_id', 'id_company');
    // }
}
