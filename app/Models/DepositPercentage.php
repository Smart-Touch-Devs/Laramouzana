<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositPercentage extends Model
{
    use HasFactory;
    protected $fillable = ['deposit_percentage'];
}
