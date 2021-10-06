<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = "admin";

    protected $fillable = ['role_id', 'country', 'city', 'first_name', 'last_name', 'email', 'birthday', 'phone', 'password'];
    public function account()
    {
        return $this->hasOne(AdminAccount::class);
    }

    public function commands()
    {
        return $this->hasMany(Command::class);
    }
    public function Country() {
        return $this->belongsTo(Country::class, 'country');
    }
    public function City() {
        return $this->belongsTo(City::class, 'city');
    }
}
