<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'amount', 'done'];

    public function clients() {
        return $this->belongsTo(clients::class, 'client_id');
    }
}
