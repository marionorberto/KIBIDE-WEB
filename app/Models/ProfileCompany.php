<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProfileCompany extends Model
{
    use HasFactory, HasUuids;
    protected $table = "profile_companies";
    protected $keyType = 'string';
    public $incrementing = false;
    public $primaryKey = 'id_profile_company';
    protected $fillable = [
        'company_id',
        'photo',
        'site_url',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($profile_companies) {
            if (empty($profile_companies->id_profile_company)) {
                $profile_companies->id_profile_company = (string) Str::uuid();
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
