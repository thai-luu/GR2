<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Models\Food;


/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class FoodRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Food::class;
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

        $users = app($this->model())
            ->select($select) 
            
            ->paginate(10);
        
        $users->setPath(route('food.index'));

        return $users;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
