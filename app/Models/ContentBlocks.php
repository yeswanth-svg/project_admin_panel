<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentBlocks extends Model
{
    //
    use HasFactory;

    protected $fillable = ['key', 'title', 'content', 'image_path'];
}
