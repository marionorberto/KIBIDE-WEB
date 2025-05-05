<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'users';
    public $primaryKey = 'id_user';


    protected $fillable = [
        'company_id',
        'username',
        'email',
        'password',
        'role',
        'active',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($user) {
            if (empty($user->id_user)) {
                $user->id_user = (string) Str::uuid();
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

    public function managedUnits(): HasMany
    {
        return $this->hasMany(Unit::class, 'manager_id', 'id_user');
    }

}