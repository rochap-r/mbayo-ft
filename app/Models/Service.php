<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['title','description','excerpt','slug','body','approved','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contacts()
    {
        return $this->hasMany(AskService::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
