<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['countryName', 'abbreviation', 'indicative'];

    public function client() {
        return $this->hasMany(clients::class);
    }
}
