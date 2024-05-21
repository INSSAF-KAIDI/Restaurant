<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    function notes() {
        return $this->hasMany(Category::class);
    }
    function categoryalimentaire() {
        return $this->belongsTo(CategoryAlimentaire::class,"category_alimetaire_id");
    }
}

