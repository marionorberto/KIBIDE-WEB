<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class UnitDisplayImages extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'unit_images';
    public $primaryKey = 'id_unit_display_image';

    protected $fillable = [
        'unit_id',
        'image_path',
        'active',
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($image) {
            if (empty($image->id_unit_image)) {
                $image->id_unit_image = (string) Str::uuid();
            }
        });
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
}
