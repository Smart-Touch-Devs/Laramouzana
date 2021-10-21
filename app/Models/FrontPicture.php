<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontPicture extends Model
{
    use HasFactory;
    protected $fillable =['picture_lat1','picture_lat2'];
}
