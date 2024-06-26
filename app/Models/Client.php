<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Client extends Model
{
    use HasFactory;
    protected $guarded = [];

    function Client() {
        return $this->hasMany(Client::class);
    }
    function User() {
        return $this->belongsTo(User::class,"user_id");
    }

}
