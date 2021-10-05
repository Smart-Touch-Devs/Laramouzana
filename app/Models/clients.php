<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class clients extends Authenticatable
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'email_verified',
        'password',
        'birthday',
        'phone',
        'country',
        'city',
        'affiliate_code',
        'sup_code',
        'password',
        'selfie',
        'CNIB',
        'card_recto',
        'card_verso',
        'role'
    ];

    public function clientCountry() {
        return $this->belongsTo(Country::class, 'country');
    }

    public function clientCity() {
        return $this->belongsTo(City::class, 'city');
    }

    public function account() {
        return $this->hasOne(ClientAccount::class);
    }

    public function commands() {
        return $this->hasMany(Command::class);
    }

}
