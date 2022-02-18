<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ExerciseModeRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
class ExerciseModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $exerciseModeRepository;
    
    public function __construct(ExerciseModeRepositoryEloquent $exerciseModeRepository){
        $this->exerciseModeRepository = $exerciseModeRepository;

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

        $exerciseModes = $this->exerciseModeRepository->queryDataAll($dataRequest);

        if ($request->ajax()) {
            return view('exerciseMode.table', compact('exerciseModes'))->render();
            
        }

        return view('exerciseMode.index', compact('exerciseModes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exerciseMode.create');
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
        $input['salt'] = md5(Str::random());
        $input['name'] = trim($input['name']);
        $input['algorithm'] = 'sha1';
        $input['password'] = sha1($input['salt'] . e(trim($input['password'])));
        $exercises = $this->exerciseModeRepository->create($input);
        if($request->input('permissions') == null) {
            $permissionNames = [];
        }
        else {
            $permissionNames = $request->input('permissions');
        }
        $exercises->givePermissionTo($permissionNames);
        Flash::success('Thêm mới exercise thành công.');
        return redirect(route('exercise.index'));
    }
    public function getLogin(){
        return view('welcome');
    }
    
    public function postLogin(Request $request)
    {
       
            $data = $this->exerciseRepository->login($request->all());
            if ($data) {
                
                $request->session()->regenerateToken();
                session()->flash('success', trans('message.login_success'));
               // activity()->log('exercise ' . auth()->exercise()->exercisename . ' was log in');
            } else {
                session()->flash('error', trans('message.login_fail'));
                return redirect()->back();
            }

     
        return redirect('/home');
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
