<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'amount'];

    public function clients() {
        return $this->belongsTo(clients::class, 'client_id');
    }
}
