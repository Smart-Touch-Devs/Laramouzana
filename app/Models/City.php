<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class City extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['belongedCountry', 'cityName'];
    public function client() {
        return $this->hasMany(clients::class);
    }
}
