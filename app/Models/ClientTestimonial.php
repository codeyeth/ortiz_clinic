<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTestimonial extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_name',
        'testimonial',
        'service_purchased',
        'is_published',
        
        'created_by_id',
        'created_by',
    ];
    
}