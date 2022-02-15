<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ModeRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash as FlashFlash;

class ModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modeRepository;
    
    public function __construct(ModeRepositoryEloquent $modeRepository){
        $this->modeRepository = $modeRepository;

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

        $modes = $this->modeRepository->queryDataAll($dataRequest);

        if ($request->ajax()) {
            return view('mode.table', compact('modes'))->render();
            
        }

        return view('mode.index', compact('modes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('mode.create');
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
        $modes = $this->modeRepository->create($input);
        Flash::success('Thêm mới chế độ ăn mẫu thành công.');
        return redirect(route('mode.index'));
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
     
        $mode = $this->modeRepository->find($id);
        if(!$mode){
            Flash::error('mode not found');
            
            return redirect('mode.index');
        }
     
        return view('mode.edit',compact('mode'));
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
        $modes = $this->modeRepository->update($input,$id);
        Flash::success('Thêm mới chế độ ăn mẫu thành công.');
        return redirect(route('mode.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mode = $this->modeRepository->find($id);
        if (empty($mode)) {
            Flash::error('mode not found');

            return redirect(route('mode.index'));
        }
        $this->modeRepository->delete($id);
        Flash::success('mode deleted successfully.');
        return redirect(route('mode.index'));
    }
}
