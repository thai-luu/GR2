<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    private $exerRepo;
    
    public function __construct(ExerciseRepositoryEloquent $exerRepo){
        $this->exerRepo = $exerRepo;

    }

    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $name = $request->input('name');
        $category = $request->input('category');
        $muscles = $request->input('muscles');
        $exercises = Exercise::where('user_id',$userId);
        if($name){
            $name = '%'.$name.'%';
            $exercises->where('name', 'like', $name);
        }
        if($category){
            $exercises->where('exercise_categories_id', $category);
        }
        if($muscles){
            $exercises->with(['muscle' => function($query) use ($muscles) {
                $query->whereIn('id', $muscles);
            }])->whereHas('muscle', function($query) use($muscles) {
                    $query->whereIn('id', $muscles);
            });
        }
        $exercises = $exercises->with(['muscle', 'exerciseCategory', 'level'])->paginate(10);

        return ExerciseResource::collection($exercises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $exercise = Exercise::create($input);
        $exercise->muscle()->sync($input['muscle']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
