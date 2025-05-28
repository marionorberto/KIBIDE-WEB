<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'units';
    public $primaryKey = 'id_unit';


    protected $fillable = [
        'company_id',
        'unit_name',
        'unit_email',
        'unit_phone',
        'unit_address',
        'manager_id',
        'active',
    ];

    protected static function booted()
    {
        parent::boot();

        // Gerar UUID automaticamente ao criar o modelo
        static::creating(function ($unit) {
            if (empty($unit->id_unit)) {
                $unit->id_unit = (string) Str::uuid();
            }
        });
    }

    protected $attributes = [
        'active' => true,       // garanti que a campo active receba true como padrão
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id_company');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'unit_id', 'id_unit');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id', 'id_user');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'unit_id');
    }

    public function dayOperations()
    {
        return $this->hasMany(DayOperation::class, 'unit_id');
    }

    public function OperationAssociations()
    {
        return $this->hasMany(DayOperation::class, 'unit_id');
    }

    public function scales()
    {
        return $this->hasMany(Scale::class, 'unit_id');
    }

    public function scaleUsers()
    {
        return $this->hasMany(ScaleUser::class, 'unit_id');
    }

    public function deskCounters()
    {
        return $this->hasMany(DeskCounter::class, 'unit_id');
    }
}