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
    });
});
Route::resource('classify', 'ClassifyController');
Route::resource('mode', 'ModeController');
Route::get('target', 'TargetController@index');
Route::get('level', 'LevelController@index');
Route::get('exercise-mode', 'ExerciseModeController@index');
Route::get('diet', 'DietController@index');
