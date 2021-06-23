<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CookbookUsersController;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\TrainingUnitsController;
use App\Http\Controllers\IndividualTrainingController;
use App\Http\Controllers\TrainingplansIndividualController;
use App\Http\Controllers\TrainingplansDetailsController;
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

Route::group([
    'middleware' => ['api','cors'],
    
    'prefix' => 'api',
],function() {

    Route::get('/getAll', [TrainingUnitsController::class, 'index'])->name('index');
    Route::post('/addUnit', [TrainingUnitsController::class, 'addUnit'])->name('addUnit');
    Route::post('/uploadFile', [TrainingUnitsController::class, 'uploadFile'])->name('uploadFile');
    Route::put('/updateUnit/{id}', [TrainingUnitsController::class, 'updateUnit'])->name('updateUnit');
    Route::post('/removeUnit/{id}', [TrainingUnitsController::class, 'removeUnit'])->name('removeUnit');
});

Route::group([
    'middleware' => ['api','cors'],
    
    'prefix' => 'api',
],function() {

    Route::get('/getTrainingCats', [IndividualTrainingController::class, 'fetchTrainingUnitCat'])->name('fetchTrainingUnitCat');
    Route::get('/getTrainingCatSelection/{trainingCatID}', [IndividualTrainingController::class, 'fetchTrainingCatSelection'])->name('fetchTrainingCatSelection');
    Route::post('/addPlan', [IndividualTrainingController::class, 'addPlan'])->name('addPlan');
    Route::post('/removeTrainingPlan/{TrainingplansIndividualId}', [TrainingplansIndividualController::class, 'removePlan'])->name('removePlan');
    Route::get('/trainingList/{traineeID}', [IndividualTrainingController::class, 'getTraineeLists'])->name('getTraineeLists');
    Route::get('/trainingUnitsbyListID/{IndividualTrainingId}', [IndividualTrainingController::class, 'trainingUnitsbyListID'])->name('trainingUnitsbyListID');

    Route::post('/addTrainingUnit', [TrainingplansDetailsController::class, 'addUnitToPlan'])->name('addUnitToPlan');
    Route::put('/updateTrainingUnit/{id}', [TrainingplansDetailsController::class, 'updateUnit'])->name('updateUnit');
    Route::post('/removeTrainingUnit/{IndividualTrainingId}', [TrainingplansDetailsController::class, 'removeUnit'])->name('removeUnit');
});




