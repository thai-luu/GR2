<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserRepository;
use App\Models\PhysicalCondition;
use App\Validators\FoodModeValidator;

/**
 * 
 *
 * @package namespace App\Repositories\Eloquent;
 */
class PhysicalConditionRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PhysicalCondition::class;
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

        $partMinis = app($this->model())
            ->select($select)  
            ->paginate(10);
        
        $partMinis->setPath(route('partMini.index'));

        return $partMinis;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
