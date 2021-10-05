<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminAccount extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['admin_id', 'amount'];
    public function admin() {
        return $this->hasOne(admin::class);
    }
}
