<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\DietRepositoryEloquent;
use App\Models\Diet;
use App\Http\Requests\Diet\CreateDietRequest;
use App\Http\Requests\Diet\UpdateDietRequest;
use App\Http\Resources\Diet\DietResource;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $dietRepo;
    
    public function __construct(DietRepositoryEloquent $dietRepo){
        $this->dietRepo = $dietRepo;

    }
    public function index()
    {
        $diet =  $this->dietRepo->with(['modeTarget' => function($query) {
            $query->with('mode','target');
        }])->paginate(10);
        return DietResource::collection($diet);
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
    public function store(CreateDietRequest $request)
    {
        $input = $request->all();
        // $input['user_id'] = 0;
        return $this->dietRepo->create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Diet $diet)
    {
        return DietResource::make($diet->load(['modeTarget' => function($query) {
            $query->with('mode','target');
        }]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDietRequest $request, Diet $diet)
    {
        $input = $request->all();
        // $input['user_id'] = 0;
        return $this->dietRepo->update($input->all(),$diet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diet $diet)
    {
        $this->dietRepo->delete($diet->id);
    }
}
