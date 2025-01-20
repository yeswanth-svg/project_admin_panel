<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMembers extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'position', 'bio', 'image_path'];
}
