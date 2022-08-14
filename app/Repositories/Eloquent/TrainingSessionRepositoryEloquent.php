<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserRepository;
use App\Models\TrainingSession;
use App\Validators\FoodModeValidator;
use App\Models\Exercise;

/**
 * 
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TrainingSessionRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TrainingSession::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function queryDataAll($request, $select = '*')
    {
        $name = $request->input('nameTrain');
        $muscles = $request->input('muscles');
        $trainingSession = app($this->model())
            ->select($select);
        $sys = $request->input('sys');
        $user = $request->user()->id;
        if($sys == 0)
        $trainingSession->where('user_id', $user);
        else
        $trainingSession->where('status', 1);
        if($name){
            $name = '%'.$name.'%';
            $trainingSession->where('name', 'like', $name);
        }
        if($muscles){
            $exercises = Exercise::with(['muscle' => function($query) use ($muscles) {
                $query->whereIn('id', $muscles);
            }])->whereHas('muscle', function($query) use($muscles) {
                    $query->whereIn('id', $muscles);
            })->pluck('id');
            $trainingSession->with(['exercise' => function($query) use ($exercises) {
                $query->whereIn('id', $exercises);
            }])->whereHas('exercise', function($query) use($exercises) {
                    $query->whereIn('id', $exercises);
            });
        } 

        return $trainingSession;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
