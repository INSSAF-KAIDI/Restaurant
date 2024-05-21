<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table="adresses";
    protected $guarded = [];    
    function notes() {
        return $this->hasMany(Adresse::class);
    }
}
