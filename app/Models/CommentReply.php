<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'photo_id',
        'body',
        'is_active',
    ];

    public function comment() {
        return $this->belongsTo(Comment::class);
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

}
