<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postule extends Model
{
    use HasFactory;

    protected $fillable = [
        'idemp',
        'idoffre',
        'date'
    ];
}
