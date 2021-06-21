<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable=[

        'Zutat','Fett','Kohlenhydrate','Protein','kcal'
    ];
}
