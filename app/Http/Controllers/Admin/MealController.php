<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Repositories\Eloquent\MealRepositoryEloquent;
class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $mealRepo;
    
    public function __construct(MealRepositoryEloquent $mealRepo){
        $this->mealRepo = $mealRepo;
    }
    public function index()
    {
        $this->mealRepo->all();
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
        $input = $request->all();
        $input['meat'] = json_encode($input['meat'],true);
        $input['vegetable'] = json_encode($input['vegetable'],true);
        $input['fruit'] = json_encode($input['fruit']);
        $this->mealRepo->create($input);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        $meal->meat = json_decode($meal->meat);
        $meal->vegetable = json_decode($meal->vegetable);
        $meal->fruit = json_decode($meal->fruit);
        return $meal;
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
    public function update(Request $request,Meal $meal)
    {
        $input = $request->all();
        $input['meat'] = json_encode($input['meat'],true);
        $input['vegetable'] = json_encode($input['vegetable'],true);
        $input['fruit'] = json_encode($input['fruit']);
        $this->mealRepo->update($input,$meal->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $this->mealRepo->delete($meal->id);
    }
}
