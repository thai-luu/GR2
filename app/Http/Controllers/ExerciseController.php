<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ExerciseRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
use App\Models\Exercise;
use App\Models\Muscle;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\ExerciseSystemResource;
use App\Models\Level;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $exerciseRepository;
    
    public function __construct(ExerciseRepositoryEloquent $exerciseRepository){
        $this->exerciseRepository = $exerciseRepository;

    }
    public function index(Request $request)
    {
        $exercises = Exercise::all()->load(['muscle', 'exerciseCategory', 'level']);
        
        return ExerciseResource::collection($exercises);
    }

    public function show(Exercise $exercise)
    {
        
        return ExerciseResource::make($exercise);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSystemExerciseByMuscle()
    {
        $exercises = Muscle::all()->load(['exercise.level', 'exercise.muscle']);

        return ExerciseSystemResource::collection($exercises);
    }
}
