<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\ExerciseMode;


/**
 * Class ExerciseModeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ExerciseModeRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ExerciseMode::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function queryDataAll($input, $select = '*')
    {

        $perPage = 10;
        if (isset($input['per_page'])) {
            $perPage = $input['per_page'];
        }

        $exercises = app($this->model())
            ->select($select)  
            ->paginate(10);
        
        $exercises->setPath(route('exercise.index'));

        return $exercises;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
