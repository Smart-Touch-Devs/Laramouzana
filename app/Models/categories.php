<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ["category_name", "category_desc","cat_picture"];

    public function product(){

        return $this->hasMany(products::class);
    }
}
