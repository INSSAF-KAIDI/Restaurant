<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable= ['client_id','NomClient','table_id','NumTable','DateDemande','status'];

    function client()
   {
       return $this->belongsTo(Client::class, 'client_id');
   }

 function table()
   {
       return $this->belongsTo(Table::class, 'table_id');
   }
}
