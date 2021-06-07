<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchContacts extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'branch_id',
        'contact_number',
        'created_by',
        'created_by_id',
    ];
}