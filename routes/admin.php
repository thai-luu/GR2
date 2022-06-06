<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:api','scope:*'], 
  ], function() {
      Route::resource('exercise_mode', 'Admin\ExerciseModeController');
      Route::resource('exercise', 'Admin\ExerciseController');
      Route::resource('level', 'Admin\LevelController');
      Route::resource('training-session', 'Admin\TrainingSessionController');
      Route::resource('diet', 'Admin\DietController');
      Route::resource('food', 'Admin\FoodController');
      Route::resource('classify', 'ClassifyController');
  });