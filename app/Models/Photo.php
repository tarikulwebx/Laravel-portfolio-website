<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $uploads = '/images/';

    public function getNameAttribute($name) {
        return $this->uploads . $name;
    }
}
