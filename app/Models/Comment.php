<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'author',
        'email',
        'photo_id',
        'body',
        'is_active',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function replies() {
        return $this->hasMany(CommentReply::class);
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

}
