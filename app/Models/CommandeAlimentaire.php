<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeAlimentaire extends Model
{
    use HasFactory;

    protected $guarded = [];

    function commande()
   {
       return $this->belongsTo(Commande::class, 'commande_id');
   }

 function alimentaire()
   {
       return $this->belongsTo(Alimentaire::class, 'alimentaire_id');
   }

   function sizealimentaire()
   {
       return $this->belongsTo(SizeAlimentaire::class, 'siz_alimentaire_id');
   }
}
