<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Repositories\Eloquent\TrainingSessionRepositoryEloquent;
use App\Http\Resources\TrainingSession\TrainingSessionResource;

class TrainingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $trainingSessionRepository;
    
    public function __construct(TrainingSessionRepositoryEloquent $trainingSessionRepository){
        $this->trainingSessionRepository = $trainingSessionRepository;

    }

    public function index(Request $request)
    {
        $user = $request->user()->id;
        $train_sessList = TrainingSession::where('user_id', $user)->with('exercise.exerciseCategory')->paginate(10);
        
        return TrainingSessionResource::collection($train_sessList);
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
        $data = $request->all();
        $user = $request->user()->id;
        $exerciseList = $data['exercises']; 
        $data['user_id'] = $user;
        $data['status'] = 0;     
        unset($data['exercises']);
        $train_sess = $this->trainingSessionRepository->create($data);
        $arrKey = [];
        $arrInsertKey = ['sets', 'time'];
        foreach($exerciseList as $key => &$value){
            array_push($arrKey, $value['id']);
            $value['sets'] = json_encode($value['sets']);
            $value = array_intersect_key($value, array_flip($arrInsertKey));
        }
        
        $exerciseList = array_combine($arrKey, $exerciseList);
        $this->trainingSessionRepository->sync($train_sess->id,'exercise',$exerciseList);
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
