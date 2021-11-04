<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commanded_products extends Model
{
    use HasFactory;

    protected $fillable = ['command_id', 'product_id', 'quantity'];

    public function Command(){
        return $this->belongsTo(Command::class,'command_id');
    }

    public function products() {return $this->belongsTo(products::class, 'product_id');}
}
