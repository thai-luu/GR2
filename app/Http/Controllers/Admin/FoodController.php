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
        $input = $request->all();
        $name = $request->input('name');
        $classify = $request->input('classify');
        $protein = $request->input('protein');
        $carb = $request->input('carb');
        $fat = $request->input('fat');
        $cenluloza = $request->input('cenluloza');
        $cholesteron = $request->input('cholesteron');
        $foods = Food::where('status', 1);
        if($name){
            $name = '%'.$name.'%';
            $foods = $foods->where('name', 'like', $name);
        }
        if($classify){
            $foods = $foods->where('classify_id', $classify);
        }
        if($protein){
            switch ($protein) {
                case 1:
                    $foods->where('protein', '<', 20);
                    break;
                case 2:
                    $foods->where('protein', '>=', 20)->where('protein', '<=', 30);
                    break;
                case 3:
                    $foods->where('protein', '>', 30);
                    break;
                default:
                    break;
                }
            }
        if($carb){
            switch ($carb) {
                case 1:
                    $foods->where('carb', '<', 20);
                    break;
                case 2:
                    $foods->where('carb', '>=', 20)->where('carb', '<=', 40);
                    break;
                case 3:
                    $foods->where('carb', '>=', 41)->where('carb', '<=', 60);
                    break;
                case 4:
                    $foods->where('carb', '>=', 61)->where('carb', '<=', 80);
                    break;
                case 5:
                    $foods->where('carb', '>', 80);
                    break;
                default:
                    break;
                }
            }
        if($fat){
            switch ($fat) {
                case 1:
                    $foods->where('fat', '<', 10);
                    break;
                case 2:
                    $foods->where('fat', '>=', 10)->where('fat', '<=', 20);
                    break;
                case 3:
                    $foods->where('fat', '>', 20);
                    break;
                default:
                    break;
                }
            }
        if($cenluloza){
            switch ($cenluloza) {
                case 1:
                    $foods->where('cenluloza', '<', 10);
                    break;
                case 2:
                    $foods->where('cenluloza', '>=', 10)->where('cenluloza', '<=', 20);
                    break;
                case 3:
                    $foods->where('cenluloza', '>', 20);
                    break;
                default:
                    break;
                }
            }
        if($cholesteron){
            switch ($cholesteron) {
                case 1:
                    $foods->where('cholesteron', '<', 10);
                    break;
                case 2:
                    $foods->where('cholesteron', '>=', 10)->where('cholesteron', '<=', 20);
                    break;
                case 3:
                    $foods->where('cholesteron', '>', 20);
                    break;
                default:
                    break;
                }
            }
        $foods = $foods->with('classify')->paginate(10);

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
    public function destroy(Food $food)
    {
        $food->delete();
    }
}
