<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentaire extends Model
{
    use HasFactory;
    protected $guarded = [];

    function Category()
   {
       return $this->belongsTo(Category::class, 'category_id');
   }

}
