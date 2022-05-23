<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:api','scope:*'], 
  ], function() {
      Route::prefix('lesson')->group(function () {
        Route::resource('example_lesson', 'Admin\ExampleLessonController');
      });
      Route::resource('mode', 'Admin\ModeController');
      Route::resource('exercise', 'Admin\ExcerciseController');
      Route::resource('level', 'Admin\LevelController');
  });