<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;
    

    // protected $fillable = ['categoryaddon_id','addon','prix','status'];

    // function notes() {
    //     return $this->hasMany(Addon::class);
    // }
    // function categoryaddon() {
    //     return $this->belongsTo(CategoryAddon::class,"categoryaddon_id");
    // }
    protected $table="addons";
    protected $fillable = ['addon','prix','status'];    
    function notes() {
        return $this->hasMany(Addon::class);
    }
    
}
