<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Http\Resources\MealResource;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $dayUse = $request->input('day_use');
        $meal = Meal::where('user_id',$id)
            ->whereDate('day_use', $dayUse)
            ->take(1)
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
        $data = $request->all();
        $day_use = $data['day_use'];
        $data['user_id'] = $request->user()->id;
        $data['breakfast'] = json_encode($data['breakfast']);
        $data['dinner'] = json_encode($data['dinner']);
        $data['lunch'] = json_encode($data['lunch']);
        $data['snacks'] = json_encode($data['snacks']);
        $data['training'] = json_encode($data['training']);
        $meal = Meal::updateOrCreate(
            ['day_use' => $day_use, 'user_id' => $data['user_id']],
            $data
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
