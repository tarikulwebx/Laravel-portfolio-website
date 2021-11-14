<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profession',
        'phone',
        'email',
        'facebook',
        'github',
        'twitter',
        'address',
        'cv_link',
        'short_description',
        'more_description',
        'cover_photo',
    ];
}
