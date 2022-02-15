<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Mode;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ModeRepositoryEloquent extends BaseRepository 
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mode::class;
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

        $modes = app($this->model())
            ->select($select)  
            ->paginate(10);
        
        $modes->setPath(route('dietMode.index'));

        return $modes;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
