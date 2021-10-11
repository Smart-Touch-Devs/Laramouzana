<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HashedMails extends Model
{
    use HasFactory;
    protected $fillable = ['client', 'hashed_email'];
    public function client() {
        $this->belongsTo(clients::class);
    }
}
