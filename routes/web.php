<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\IngredientController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['api','cors'],
    
    'prefix' => 'api',
],function() {

    Route::get('/recipes', [RecipeController::class, 'index'])->name('index');
    Route::get('/recipeCategories', [RecipeCategoryController::class, 'index'])->name('index');
    Route::get('/recipeId/{RecipeId}', [RecipeController::class, 'show'])->name('show');
});


Route::group([
    'middleware' => ['api','cors'],
    
    'prefix' => 'api',
],function() {

    Route::get('/ingredient', [IngredientController::class, 'index'])->name('index');
    Route::get('/ingredient/{IngredientId}', [IngredientController::class, 'show'])->name('show');
    Route::post('/ingredient',[IngredientController::class,'store'])->name('store');
    Route::patch('/ingredient/{IngredientId}', [IngredientController::class, 'update'])->name('update'); // NIY
    Route::delete('/ingredient/{IngredientId}', [IngredientController::class, 'destroy'])->name('destroy'); // NIY
});