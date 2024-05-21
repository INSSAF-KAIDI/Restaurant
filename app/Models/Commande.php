<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    



    protected $guarded = [];

     function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

  function serveur()
    {
        return $this->belongsTo(Serveur::class, 'serveur_id');
    }

}
