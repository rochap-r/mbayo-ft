<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['body','user_comment_id','post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function userComment()
    {
        return $this->belongsTo(UserComment::class);
    }
}
