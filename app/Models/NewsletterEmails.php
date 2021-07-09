<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterEmails extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email_id',
        'email',
        'ip_address',
        'added_thru',
    ];
    
}
