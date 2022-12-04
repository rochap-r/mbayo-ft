<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BgConfig extends Model
{
    use HasFactory;
    protected $fillable = ['mft_bg_image','service_bg_image','contact_bg_image','about_bg_image'];
}
