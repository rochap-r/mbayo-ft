<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutConfig extends Model
{
    use HasFactory;
    
    protected $fillable=
    [
        'title','description',
        'caracteristique1',
        'caracteristique2',
        'caracteristique3',
        'caracteristique4',
        'image',
        'bg_image'
    ];
}
