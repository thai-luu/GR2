<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use App\Models\Food;
use App\Http\Resources\FoodResource;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $foodRepo;
    public function __construct(FoodRepositoryEloquent $foodRepo){
        $this->foodRepo = $foodRepo;

    }
    public function index(Request $request)
    {
        $dataRequest = $request->all();
        $foods = $this->foodRepo->where('status', 1)->queryDataAll($dataRequest);

        return FoodResource::collection($foods);
    }

    // public function indexAll(Request $request)
    // {
    //     $foods = Food::where('status', 1)->where()
    // }
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
        $input['status'] = 1;
        $input['user_id'] = $request->user()->id;
        return $this->foodRepo->create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return $food->load('classify');
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
    public function update(Request $request, Food $food)
    {
        return $this->foodRepo->update($request->all(),$food->id);
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
