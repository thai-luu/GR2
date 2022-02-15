<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\DietModeRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash as FlashFlash;

class DietModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $dietModeRepository;
    
    public function __construct(DietModeRepositoryEloquent $dietModeRepository){
        $this->dietModeRepository = $dietModeRepository;

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

        $dietModes = $this->dietModeRepository->queryDataAll($dataRequest);

        if ($request->ajax()) {
            return view('dietMode.table', compact('dietModes'))->render();
            
        }

        return view('dietMode.index', compact('dietModes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dietMode.create');
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
        $input['cenluloza'] = trim($input['cenluloza']);
        $input['mode_id'] = trim($input['mode_id']);
        $dietModes = $this->dietModeRepository->create($input);
        Flash::success('Thêm mới chế độ ăn mẫu thành công.');
        return redirect(route('dietMode.index'));
    }
   
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $dietMode = $this->dietModeRepository->find($id);
        if(!$dietMode){
            Flash::error('dietMode not found');
            
            return redirect('dietMode.index');
        }
     
        return view('dietMode.edit',compact('dietMode'));
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
        $input['cenluloza'] = trim($input['cenluloza']);
        $input['mode_id'] = trim($input['mode_id']);
        $dietModes = $this->dietModeRepository->update($input,$id);
        Flash::success('Thêm mới chế độ ăn mẫu thành công.');
        return redirect(route('dietMode.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dietMode = $this->dietModeRepository->find($id);
        if (empty($dietMode)) {
            Flash::error('dietMode not found');

            return redirect(route('dietMode.index'));
        }
        $this->dietModeRepository->delete($id);
        Flash::success('dietMode deleted successfully.');
        return redirect(route('dietMode.index'));
    }
}
