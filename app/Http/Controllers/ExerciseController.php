<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Flash;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;
    
    public function __construct(UserRepositoryEloquent $userRepository){
        $this->userRepository = $userRepository;

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

        $users = $this->userRepository->queryDataAll($dataRequest);

        if ($request->ajax()) {
            return view('user.table', compact('users'))->render();
            
        }

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
        $users = $this->userRepository->create($input);
        if($request->input('permissions') == null) {
            $permissionNames = [];
        }
        else {
            $permissionNames = $request->input('permissions');
        }
        $users->givePermissionTo($permissionNames);
        Flash::success('Thêm mới user thành công.');
        return redirect(route('user.index'));
    }
    public function getLogin(){
        return view('welcome');
    }
    
    public function postLogin(Request $request)
    {
       
            $data = $this->userRepository->login($request->all());
            if ($data) {
                
                $request->session()->regenerateToken();
                session()->flash('success', trans('message.login_success'));
               // activity()->log('User ' . auth()->user()->username . ' was log in');
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
