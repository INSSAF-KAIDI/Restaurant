<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_Achat extends Model
{
    
    use HasFactory;
    
    protected $fillable = ['fournisseur_id','NomFournisseur','no_invoice','montant','date','status'];

    function notes() {
        return $this->hasMany(Ligne_Achat::class);
    }
    function Fournisseur() {
        return $this->belongsTo(Fournisseur::class,"fournisseur_id");
    }
    
}
