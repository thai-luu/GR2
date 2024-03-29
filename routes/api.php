<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('user/get', 'API\UserController@index');
Route::prefix('')->group(function () {
    
});
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('user/login', 'API\UserController@login');
    Route::post('user/signup', 'API\UserController@store');
    Route::put('user/{user}/update', 'API\UserController@update');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::post('user/logout', 'API\AuthController@logout');
        Route::get('user', 'API\AuthController@user');
        Route::group(['middleware' => ['scope:*']],function(){
            Route::get('/test','FoodController@test');
        });
        Route::resource('meal', 'MealController');
        
    });
});
Route::group([
    'middleware' => 'auth:api'
  ], function() {
        Route::resource('meal','API\MealController');
        Route::resource('exercise', 'API\ExerciseController');
        Route::post('exercise/delete-multiple', 'API\ExerciseController@deleteMultiple');
        Route::resource('food','API\FoodController');
        Route::post('food/delete-multiple','API\FoodController@deleteMultiple');
        Route::resource('training-session','API\TrainingSessionController');
        Route::resource('diary', 'API\DiaryController');
        Route::post('evaluate', 'API\EvaluateController@evaluate');
  });
Route::get('classify', 'ClassifyController@index');
Route::resource('mode', 'ModeController');
Route::get('target', 'TargetController@index');
Route::get('level', 'LevelController@index');
Route::get('exercise-mode', 'ExerciseModeController@index');
Route::get('diet', 'DietController@index');
Route::get('beforeLogin/food','FoodController@index');
Route::get('exercise-category', 'ExerciseCategoryController@index');
Route::get('muscles', 'MuscleController@index');
Route::prefix('exercise')->group(function () {
    Route::get('system/get-system-exercise-by-muscle', 'ExerciseController@getSystemExerciseByMuscle');
    Route::get('system/{exercise}', 'ExerciseController@show'); 
});
Route::get('beforeLogin/training-session', 'Admin\TrainingSessionController@indexHome');
Route::get('lesson', 'LessonController@index');
Route::get('system/training-session','TrainingSessionController@index');
Route::get('system/training-session-profile','TrainingSessionController@indexProfile');
Route::post('upload', 'UploadController@storeUp');

