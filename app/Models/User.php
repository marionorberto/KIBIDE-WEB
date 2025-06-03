<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'users';
    public $primaryKey = 'id_user';


    protected $fillable = [
        'company_id',
        'unit_id',
        'username',
        'email',
        'password',
        'role',
        'active',
        'photo',
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

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }

    public function managedUnit()
    {
        return $this->hasOne(Unit::class, 'manager_id', 'id_user');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function deskCounters()
    {
        return $this->hasMany(DeskCounter::class, 'user_id');
    }

}