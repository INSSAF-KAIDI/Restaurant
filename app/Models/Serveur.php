<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serveur extends Model
{
    use HasFactory;
    
    
    protected $fillable = ['NomServeur','email','telephone','adresse','status'];

    function notes() {
        return $this->hasMany(Serveur::class);
    }
    function user() {
        return $this->belongsTo(User::class,"user_id");
    }
}
