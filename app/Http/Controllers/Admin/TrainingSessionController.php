<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\TrainingSessionRepositoryEloquent;
use App\Models\TrainingSession;
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
        $train_sessList =  $this->trainingSessionRepository->queryDataAll($request)->with('exercise.exerciseCategory')->paginate(10);
    
        return TrainingSessionResource::collection($train_sessList);
    }

    public function indexHome()
    {
        return TrainingSessionResource::collection(TrainingSession::where('status', 1)->get());
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
        $exerciseList = $data['exerciseList'];
        unset($data['exerciseList']);
        $train_sess = $this->trainingSessionRepository->create($data);
        $arrKey = [];
        foreach($exerciseList as $key => &$value){
            array_push($arrKey, $value['id']);
            unset($value['id']);
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
    public function show(TrainingSession $train_sess)
    {
        $training = $train_sess->load('exercise.exerciseCategory');
        return TrainingSessionResource::make($training);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingSession $train_sess)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingSession $train_sess, Request $request)
    {
        $data = $request->all();
        $user = $request->user()->id;
        $exerciseList = $data['exercises']; 
        $data['user_id'] = $user;    
        unset($data['exercises']);
        $train_sess->update($data);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingSession $train_sess)
    {
        $train_sess->delete();
    }
    
    public function changeToArray($exerciseList){
         $data = array();
         foreach($exerciseList as $key => $value){
             array_push($data,$value['id']);
         }
         return $data;
    }
}
