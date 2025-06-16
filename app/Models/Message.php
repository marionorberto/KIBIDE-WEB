<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class Message extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'messages';
    public $primaryKey = 'id_message';

    protected $fillable = [
        'unit_id',
        'sender_id',
        'receiver_id',
        'subject',
        'content',
        'is_read',
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($message) {
            if (empty($message->id_message)) {
                $message->id_message = (string) Str::uuid();
            }
        });
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id_user');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id_user');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
}
