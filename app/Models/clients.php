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
        return $this->hasOne(ClientAccount::class, 'client_id');
    }

    public function commands() {
        return $this->hasMany(Command::class);
    }

    public function deposits() {
        $this->hasMany(Deposit::class, 'client_id');
    }

    public function withdraws() {
        $this->hasMany(Withdraw::class, 'client_id');
    }

    public function transaction() {
        return $this->hasMany(Transaction::class);
    }

    public function parrain() {
        return $this->where('sup_code', auth()->user()->sup_code)->first();
    }

    public function firstGeneration() {
        return $this->where('sup_code', auth()->user()->affiliate_code)->get();
    }

    public function secondGeneration() {
        $secondGeneration = [];
        foreach ($this->firstGeneration() as $client) {
            $sub_affiliates = $this->where('sup_code', $client->affiliate_code)->get();
            foreach ($sub_affiliates as $sub_affiliate) {
                array_push($secondGeneration, $sub_affiliate);
            }
        }
        return $secondGeneration;
    }

    public function thirdGeneration() {
        $thirdGeneration = [];
        foreach ($this->secondGeneration() as $client) {
            $sub_affiliates = $this->where('sup_code', $client->affiliate_code)->get();
            foreach ($sub_affiliates as $sub_affiliate) {
                array_push($thirdGeneration, $sub_affiliate);
            }
        }

        return $thirdGeneration;
    }

}
