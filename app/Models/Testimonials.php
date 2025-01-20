<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonials extends Model
{
    //
    use HasFactory;

    protected $fillable = ['client_name', 'profession', 'testimonial', 'image_path'];
}
