<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CookbookUsersController;
use App\Http\Controllers\UserProgressController;

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


Route::group([
    'middleware' => ['api','cors'],
    
    'prefix' => 'api',
],function() {

    Route::get('/profileList', [CookbookUsersController::class, 'index'])->name('index');
    Route::get('/profile/{userProfileId}', [CookbookUsersController::class, 'show'])->name('show');
    
    Route::post('/createProfile', [CookbookUsersController::class, 'store'])->name('store');
    Route::patch('/updateProfile/{userProfileId}', [CookbookUsersController::class, 'update'])->name('update');
    Route::delete('/deleteProfile/{userProfileId}', [CookbookUsersController::class, 'delete'])->name('delete');
    Route::get('/test', [CookbookUsersController::class, 'test'])->name('test');
});




Route::group([
    'middleware' => ['api','cors'],
    
    'prefix' => 'api',
],function() {

    Route::get('/biometric', [UserProgressController::class, 'index'])->name('index');
    Route::get('/userProgress/{userProgressId}', [UserProgressController::class, 'showUserProgress'])->name('showUserProgress');

});

$router->group([
    'prefix' => 'individualTraining',
], function () use ($router){
    
    $router->get('/trainingList/{traineeID}', 'IndividualTrainingController@getTraineeLists');
    $router->get('/trainingUnitsbyListID/{IndividualTrainingId}', 'IndividualTrainingController@trainingUnitsbyListID');
    $router->get('/getTrainingCats', 'IndividualTrainingController@fetchTrainingUnitCat');
    $router->get('/getTrainingCatSelection/{trainingCatID}', 'IndividualTrainingController@fetchTrainingCatSelection');


    $router->post('/addPlan', 'IndividualTrainingController@addPlan');
    $router->post('/removeTrainingPlan/{TrainingplansIndividualId}', 'TrainingplansIndividualController@removePlan');


    $router->post('/addTrainingUnit', 'TrainingplansDetailsController@addUnitToPlan');
    $router->put('/updateTrainingUnit/{id}', 'TrainingplansDetailsController@updateUnit');
    $router->post('/removeTrainingUnit/{IndividualTrainingId}', 'TrainingplansDetailsController@removeUnit');

    
});


$router->group([
    'prefix' => 'manageUsers',
], function () use ($router){
    $router->get('/getAll', 'CookbookUsersController@getAll');
    $router->post('/addUnit','CookbookUsersController@addUnit') ;
   $router->put('/updateUnit/{id}','CookbookUsersController@updateUnit') ;
   $router->post('/removeUnit/{id}','CookbookUsersController@removeUnit') ;
});
