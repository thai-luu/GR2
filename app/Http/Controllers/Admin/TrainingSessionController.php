<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\TrainingSessionRepositoryEloquent;
use App\Models\TrainingSession;
use App\Http\Resources\TrainingSessionResource;

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
        $dataRequest = $request->all();
        return $this->trainingSessionRepository->queryDataAll($dataRequest);
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
        $exerciseList = $this->changeToArray($data['exerciseList']);
        unset($data['exerciseList']);
        $train_sess = $this->trainingSessionRepository->create($data);
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
        $training = $train_sess->load('exercise');
        return $training;
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
        $exerciseList = $this->changeToArray($data['exercise']);
        unset($data['exercise']);
        $train_sess->update($data);
        $this->trainingSessionRepository->sync($train_sess->id,'exercise',$exerciseList);
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
    public function changeToArray($exerciseList){
         $data = array();
         foreach($exerciseList as $key => $value){
             array_push($data,$value['id']);
         }
         return $data;
    }
}
