<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [''], 
  ], function() {
      Route::resource('exercise_mode', 'Admin\ExerciseModeController');
      Route::resource('exercise', 'Admin\ExerciseController');
      Route::resource('level', 'Admin\LevelController');
      Route::resource('training-session', 'Admin\TrainingSessionController');
      Route::resource('diet', 'Admin\DietController');
      Route::resource('food', 'Admin\FoodController');
      Route::resource('classify', 'ClassifyController');
      Route::resource('meal', 'MealController');
      Route::resource('lesson', 'Admin\LessonController');
      Route::get('lesson-delete/{id}', 'Admin\LessonController@deleteLesson');
  });
Route::group([
        'middleware' => [''], 
    ], function() {
        Route::resource('user', 'Admin\UserController');
        Route::put('user-block/{user}', 'Admin\UserController@block');
        Route::put('user-unblock/{user}', 'Admin\UserController@unBlock');
    });