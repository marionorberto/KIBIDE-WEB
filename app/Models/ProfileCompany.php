<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProfileCompany extends Model
{
    use HasFactory, HasUuids;
    protected $table = "profile_company";


    protected $keyType = 'string';
    public $incrementing = false;
    public $primaryKey = 'id_profile_company';
    protected $fillable = [
        "company_id",
        "sector_industry",
        "number_of_employees",
        "founded_at",
        "website_url",
        "facebook_url",
        "instagram_url",
        "active",
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($profile_company) {
            if (empty($profile_company->id_profile_company)) {
                $profile_company->id_profile_company = (string) Str::uuid();
            }
        });
    }

    protected $attributes = [
        'active' => true,       // garanti que a campo active receba true como padrão
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
