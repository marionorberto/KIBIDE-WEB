<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketConfiguration extends Model
{
    protected $table = "tickets_configuration";
    protected $fillable = [
        'unit_id',
        'daily_limit',
        'working_hours_start',
        'working_hours_end',
        'services_enabled',
        'auto_assign',
        'priority_enabled',
    ];
}