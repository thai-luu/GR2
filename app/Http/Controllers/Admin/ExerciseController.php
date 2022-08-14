<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Http\Resources\ExerciseResource;
class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $category = $request->input('category');
        $muscles = $request->input('muscles');
        $exercise = Exercise::where('status', 1);
        if($name){
            $name = '%'.$name.'%';
            $exercise->where('name', 'like', $name);
        }
        if($category){
            $exercise->where('exercise_categories_id', $category);
        }
        if($muscles){
            $exercise->with(['muscle' => function($query) use ($muscles) {
                $query->whereIn('id', $muscles);
            }])->whereHas('muscle', function($query) use($muscles) {
                    $query->whereIn('id', $muscles);
            });
        }
        $exercise = $exercise->with(['muscle', 'exerciseCategory', 'level'])->paginate(10);
        return ExerciseResource::collection($exercise);
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
    public function store(StoreExerciseRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $input['status'] = 1;
        $exercise = Exercise::create($input);
        $exercise->muscle()->sync($input['muscles']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {   
        return ExerciseResource::make($exercise->load(['muscle', 'exerciseCategory', 'level']));
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
    public function update(Request $request, Exercise $exercise)
    {
        $input = $request->all();
        $exercise->update($input);
        $exercise->muscle()->sync($input['muscles']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
    }
    
}