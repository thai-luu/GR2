<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson; 

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = Lesson::all()->load(
            ['mode', 'target'], ['trainingSession' => function ($query) {
                $query->exercise()->orderBy('position', 'desc')->get();
            }]
        );
        return $lesson;
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
        $modeArr = $input['mode_id'];
        $trainArr = $input['trainingSessions'];
        $targetArr = $input['target_id'];
        $arrKey = [];
        $arrValue = [];
        foreach($trainArr as $key => $value){
            array_push($arrKey, $value);
            $arrValue[]['position'] = $key + 1;
        }
        $trainArr = array_combine($arrKey, $arrValue);
        unset($input['mode_id']);
        unset($input['trainingSessions']);
        unset($input['target_id']);
        $lesson = Lesson::create($input);
        $lesson->trainingSession()->sync($trainArr);
        $lesson->mode()->sync($modeArr);
        $lesson->target()->sync($targetArr);

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
