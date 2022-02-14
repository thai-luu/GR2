<?php

namespace App\Repositories;

use App\Models\Food;
use App\Repositories\BaseRepository;

/**
 * Class FoodRepository
 * @package App\Repositories
 * @version February 1, 2022, 5:51 pm UTC
*/

class FoodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Food::class;
    }
}
