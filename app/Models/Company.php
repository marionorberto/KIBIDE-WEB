<?php

namespace App\Models;

use App\Models\Counter;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'companies';
    public $primaryKey = 'id_company';


    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_nif',
        'company_address',
        'active',
    ];

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

    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id_company');
    }



    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'company_id', 'id_company');
    }

    public function profile()
    {
        return $this->hasOne(ProfileCompany::class);
    }
}