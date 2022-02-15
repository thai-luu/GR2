<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Exercise;
use App\Validators\ExcerciseValidator;

/**
 * Class ExcerciseRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ExerciseRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Exercise::class;
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
    public function login($input){
        // dd($input);
        $exercise = $this->model->where('name', $input['name'])->select('salt', 'password', 'id')->first();
        if($exercise){
            $password = $this->getPassword($exercise->salt, $input['password']);
            // dd($password);
            if($exercise->password === $password){
              
                auth()->loginUsingId($exercise->id);
        
                return true;
                
            }
        }
        return false;
    }
    public static function getPassword($salt, $password)
    {
        return sha1($salt.$password);
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
