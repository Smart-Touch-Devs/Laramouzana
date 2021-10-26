<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['sender', 'receiver', 'amount'];

    public function Sender() {
        return $this->belongsTo(clients::class, 'sender');
    }

    public function Receiver() {
        return $this->belongsTo(clients::class, 'receiver');
    }
}
