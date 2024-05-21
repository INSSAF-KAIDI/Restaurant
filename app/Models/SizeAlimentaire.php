<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeAlimentaire extends Model
{
    use HasFactory;
    protected $guarded = [];

     function alimentaire()
    {
        return $this->belongsTo(Alimentaire::class, 'alimentaire_id');
    }

  function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
