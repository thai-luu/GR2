<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\FoodRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash as FlashFlash;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $foodRepository;
    
    public function __construct(FoodRepositoryEloquent $foodRepository){
        $this->foodRepository = $foodRepository;

    }
    public function index(Request $request)
    {
        $currentUrl = url()->previous();
        if (strpos($currentUrl, 'create') !== false) {
            $dataRequest['onPage'] = 1;
        }
        else {
            $dataRequest = $request->all();
        }

        $foods = $this->foodRepository->queryDataAll($dataRequest);

        if ($request->ajax()) {
            return view('food.table', compact('foods'))->render();
            
        }

        return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('food.create');
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
        
        $input['name'] = trim($input['name']);
        $input['protein'] = trim($input['protein']);
        $input['carb'] = trim($input['carb']);
        $input['fat'] = trim($input['fat']);
        $input['vitaminA'] = trim($input['vitaminA']);
        $input['vitaminB'] = trim($input['vitaminB']);
        $input['natri'] = trim($input['natri']);
        $input['kali'] = trim($input['kali']);
        $input['natri'] = trim($input['natri']);
        $input['calo'] = trim($input['calo']);
        $input['cenluloza'] = trim($input['cenluloza']);
        $foods = $this->foodRepository->create($input);
        Flash::success('Thêm mới food thành công.');
        return redirect(route('food.index'));
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
     
        $food = $this->foodRepository->find($id);
        if(!$food){
            Flash::error('Food not found');
            
            return redirect('food.index');
        }
        
        return view('food.edit',compact('food'));
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
        $input = $request->all();
        
        $input['name'] = trim($input['name']);
        $input['protein'] = trim($input['protein']);
        $input['carb'] = trim($input['carb']);
        $input['fat'] = trim($input['fat']);
        $input['vitaminA'] = trim($input['vitaminA']);
        $input['vitaminB'] = trim($input['vitaminB']);
        $input['natri'] = trim($input['natri']);
        $input['kali'] = trim($input['kali']);
        $input['natri'] = trim($input['natri']);
        $input['calo'] = trim($input['calo']);
        $input['cenluloza'] = trim($input['cenluloza']);
        $foods = $this->foodRepository->update($input,$id);
        Flash::success('Cập nhật food thành công.');
        return redirect(route('food.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = $this->foodRepository->find($id);
        if (empty($food)) {
            Flash::error('food not found');

            return redirect(route('food.index'));
        }
        $this->foodRepository->delete($id);
        Flash::success('food deleted successfully.');
        return redirect(route('food.index'));
    }
    public function test(){
    }
}
