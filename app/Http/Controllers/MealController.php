<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Repositories\Eloquent\MealRepositoryEloquent;
use App\Http\Resources\MealResource;

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
    public function index(Request $request, $id)
    {
        $dayUse = $request->input('day_use');
        $meal = Meal::where('user_id',$id)
            ->whereDate('day_use', $dayUse)
            ->get();

        return MealResource::collection($meal);
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
        $lunch = $input['lunch'];
        $breakfast = $input['breakfast'];
        $dinner = $input['dinner'];
        $snacks = $input['snacks'];
        $lunch['meats'] = json_encode($lunch['meats']);
        $lunch['vegatables'] = json_encode($lunch['vegatables']);
        $lunch['fruits'] = json_encode($lunch['fruits']);
        $breakfast['meats'] = json_encode($breakfast['meats']);
        $breakfast['vegatables'] = json_encode($breakfast['vegatables']);
        $breakfast['fruits'] = json_encode($breakfast['fruits']);
        $dinner['meats'] = json_encode($dinner['meats']);
        $dinner['vegatables'] = json_encode($dinner['vegatables']);
        $dinner['fruits'] = json_encode($dinner['fruits']);
        $snacks['meats'] = json_encode($snacks['meats']);
        $snacks['vegatables'] = json_encode($snacks['vegatables']);
        $snacks['fruits'] = json_encode($snacks['fruits']);
        $arrayData = array_merge($breakfast,$lunch, $dinner, $snacks);
        Meal::upsert($arrayData);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
