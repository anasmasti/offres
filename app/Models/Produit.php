<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $primaryKey = 'idpro';
    
    protected $fillable = [
        'libelle',
        'marque',
        'prix',
        'qteStock',
        'image',
    ];
}
