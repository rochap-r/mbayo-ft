<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoiceConfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','team_title',
        'quality','recompense',
        'personnel','assistance','image'
    ];
}
