<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson; 
use App\Models\Level;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $level = $request->input('level');
        if(isset($level))
        $lessonByLevel = Level::find($level);
        else
        $lessonByLevel = Level::with(
            ['lesson','lesson.trainingSession'])->get();
        // $lessonByLevel = $lessonByLevel->with(
        //     'lesson.trainingSession' 
        //     // => function ($query) {
        //     //     // $query->orderBy('position', 'asc');
        //     // }, 'lesson.trainingSession.exercise' 
            
        // )->get();

        return $lessonByLevel;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $lesson = $lesson->load(['mode', 'target', 'trainingSession' => function ($query) {
            $query->exercise()->orderBy('position', 'desc')->get();
        }]);
        return LessonEditResource::make($lesson);
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
