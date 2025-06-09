<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class Notification extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'notifications';
    public $primaryKey = 'id_notification';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'link',
        'is_seen',
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($notification) {
            if (empty($notification->id_notification)) {
                $notification->id_notification = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
