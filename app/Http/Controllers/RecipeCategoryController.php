<?php

namespace App\Http\Controllers;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;

class RecipeCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $RecipeCategory;

    public function __construct(RecipeCategory $RecipeCategory)
    {
        $this->RecipeCategory = $RecipeCategory;
    }

    public function index() {
      
        return RecipeCategory::all();

    }


   


}
