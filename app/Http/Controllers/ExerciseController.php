<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ExerciseRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $exerciseRepository;
    
    public function __construct(ExerciseRepositoryEloquent $exerciseRepository){
        $this->exerciseRepository = $exerciseRepository;

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

        $exercises = $this->exerciseRepository->queryDataAll($dataRequest);

        if ($request->ajax()) {
            return view('exercise.table', compact('exercises'))->render();
            
        }

        return view('exercise.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercise.create');
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
        $input['time'] = trim($input['time']);
        $input['note'] = trim($input['note']);
        $input['calories'] = trim($input['calories']);
        $input['linkVd'] = trim($input['linkVd']);
        $exercises = $this->exerciseRepository->create($input);
        Flash::success('Thêm mới exercise thành công.');
        return redirect(route('exercise.index'));
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
