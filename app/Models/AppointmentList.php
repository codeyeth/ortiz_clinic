<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'branch',
        'service',
        'date',
        'remarks',

        'is_done',
        'is_done_by_id',
        'is_done_by',
        'is_done_at',

        'is_confirmed',
        'is_confirmed_by_id',
        'is_confirmed_by',
        'is_confirmed_at',

        'is_replied',
        'is_replied_by_id',
        'is_replied_by',
        'is_replied_at',
    ];
    
}
