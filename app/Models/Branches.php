<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'branch_name',
        'branch_address',
        'branch_contact',
        'is_main_office',
        'created_by',
        'created_by_id',
    ];
}