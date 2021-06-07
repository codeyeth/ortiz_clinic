<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'price_range',
        'description',
        'cover_image',
        'is_most_availed',
        'created_by_id',
        'created_by',
    ];
}
