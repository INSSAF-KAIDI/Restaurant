<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['NomFournisseur','email','telephone','adresse','status'];

    function notes() {
        return $this->hasMany(Fournisseur::class);
    }
}

