<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_name',
        'acheté_de',
        'date_achat',
        'acheté_par',
        'montant',
        'payé_par',
        'status',
        'attachments',
    ];
}
