<?php

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
Route::get('/home', function () {
    return view('layouts.default');
})->middleware('auth','permission:QTV|CTV');
Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'permission:QTV'],function(){
        Route::resource('user', 'UserController');
        Route::get('/user/delete/{id}','UserController@destroy')->name('user.delete');
    });
    Route::group(['middleware' => 'permission:QTV|CTV'],function(){
        Route::resource('food', 'FoodController');
        Route::get('/food/delete/{id}','FoodController@destroy')->name('food.delete');
        Route::resource('exerciseMode', 'ExcerciseModeController');
        Route::get('/exerciseMode/delete/{id}','ExerciseModeController@destroy')->name('exerciseMode.delete');
        Route::resource('dietMode', 'DietModeController');
        Route::get('/dietMode/delete/{id}','DietModeController@destroy')->name('dietMode.delete');
        Route::resource('exercise', 'ExcerciseController');
        Route::get('/exercise/delete/{id}','ExerciseController@destroy')->name('exercise.delete');
    });
});

Route::get('/login','UserController@getLogin')->name('login');
Route::post('/user/postLogin','UserController@postLogin')->name('postLogin');
Route::get('/logout','Auth\LoginController@logout');


