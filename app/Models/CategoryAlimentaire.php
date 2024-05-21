<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAlimentaire extends Model
{
    use HasFactory;
    protected $guarded = [];

    function notes() {
        return $this->hasMany(CategoryAlimentaire::class);
    }
    function category() {
        return $this->belongsTo(Category::class,"category_id");
    }
}
