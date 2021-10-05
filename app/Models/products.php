<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','category_id','stock','delivery_time','delivery_time_rup','price','pdf1','pdf2','pdf3','picture1','picture2','picture3','product_desc'];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }

    public function Commanded_products(){

        return $this->hasMany(Commanded_products::class);
    }
}
