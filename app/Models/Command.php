<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $fillable = [
        'clients_id', 'deliverer_id', 'is_delivered'
    ];
    public function Commanded_products()
    {

        return $this->hasMany(Commanded_products::class);
    }
    public function clients()
    {

        return $this->belongsTo(clients::class);
    }
    public function admins()
    {

        return $this->belongsTo(admin::class, 'deliverer_id');
    }
}
