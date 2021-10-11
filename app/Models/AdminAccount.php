<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id', 'amount'];
    public function admin() {
        return $this->hasOne(admin::class);
    }
}
