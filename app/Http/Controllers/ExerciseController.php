<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ExerciseRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
use App\Models\Exercise;
use App\Models\Muscle;
use App\Http\Resources\ExerciseResource;
use App\Http\Requests\Exercise\StoreExerciseRequest;
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
        $exercises = Exercise::where('status', 1)->with(['muscle', 'exerciseCategory', 'level'])->get();
        
        return ExerciseResource::collection($exercises);
    }

    public function show(Exercise $exercise)
    {
        $exercise = $exercise->load(['muscle', 'exerciseCategory', 'level']);
        return ExerciseResource::make($exercise);
    }

    public function store(StoreExerciseRequest $request)
    {
        
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
