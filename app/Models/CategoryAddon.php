<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAddon extends Model
{
    use HasFactory;
    protected $guarded = [];

    function notes() {
        return $this->hasMany(CategoryAddon::class);
    }
    function category() {
        return $this->belongsTo(Category::class,"category_id");
    }

}
