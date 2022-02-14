<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Models\Diet;


/**
 * Class DietRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class DietRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Diet::class;
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
        
        $users->setPath(route('user.index'));

        return $users;
    }
    public function login($input){
        // dd($input);
        $user = $this->model->where('name', $input['name'])->select('salt', 'password', 'id')->first();
        if($user){
            $password = $this->getPassword($user->salt, $input['password']);
            // dd($password);
            if($user->password === $password){
              
                auth()->loginUsingId($user->id);
        
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
