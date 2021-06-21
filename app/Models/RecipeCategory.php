<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';
   // protected $table = 'Recipes';
   // public $timestamps = true;

    protected $casts = [
       
    ];

    protected $fillable = [
        
    ];

   
}
