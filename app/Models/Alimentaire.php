<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentaire extends Model
{
    use HasFactory;
    protected $guarded = [];

    function CategoryAlimentaire()
   {
       return $this->belongsTo(CategoryAlimentaire::class, 'category_alimentaire_id');
   }

}