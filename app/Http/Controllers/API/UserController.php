<?php

namespace App\Http\Controllers\API;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    /**
     * Logout user (Revoke the token)
     * */
    private $userRepository;
    
    public function __construct(UserRepositoryEloquent $userRepository){
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->querryAll();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $input = $request->all();
        $input['salt'] = md5(Str::random());
        $input['name'] = trim($input['name']);
        // $name = $this->userRepository->findByField('name',$input['name']);
        // $email = $this->userRepository->findByField('email',$input['email']);
      
        // if(isset($name[0]->name)){
        //     $message = 'User name bị trùng mời bạn nhập lại.';
        //     return response()->json([
        //         'message' => $message
        //     ], 202);
        // }
        // if(isset($email[0]->email)){
        //     $message = 'User email bị trùng mời bạn nhập lại..';
        //     return response()->json([
        //         'message' => $message
        //     ], 202);
        // return redirect(route('user.create'));
        // }
        $input['algorithm'] = 'sha1';
        $input['password'] = sha1($input['salt'] . e(trim($input['password'])));
        $input['mode_id'] = $this->checkMode($input['wrist']);
        $input['physical_id'] = $this->checkPhysical($input['weight'], $input['height']);
        $users = $this->userRepository->create($input);
        if($request->input('permissions') == null) {
            $permissionNames = ['ND'];
        }
        else {
            $permissionNames = $request->input('permissions');
        }
        $users->givePermissionTo($permissionNames);
        return response()->json([
            'message' => 'Successfully created user!'
        ], 200);
    }
    public function login(Request $request)
    {
       
            $data = $this->userRepository->login($request->all());
            if ($data) {
                $user = $request->user();
                if($user->permissions[0]->name == 'QTV'){
                    $tokenResult = $user->createToken('Personal Access Token',['*']);
                }
                elseif($user->permissions[0]->name == 'CTV'){
                    $tokenResult = $user->createToken('Personal Access Token',['cobolarator']);
                }
                else{
                    $tokenResult = $user->createToken('Personal Access Token',['user']);
                }
                $token = $tokenResult->token;
                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
            } else {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input= $request->all();
        $input['level_id'] = $input['level_id']['id'];
        $input['target_id'] = $input['target_id']['id'];
        $input['mode_id'] = $this->checkMode($input['wrist']);
        $input['physical_id'] = $this->checkPhysical($input['weight'], $input['height']);
        $this->userRepository->update($input, $user->id);
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
    
    public function checkMode($wrist){
        if($wrist <= 17.7){
            return 2;
        }
        if($wrist > 17.7 && $wrist <= 20.3){
            return 3;
        }
        if($wrist > 20.3){
            return 1;
        }
    }

    public function checkPhysical($weight, $height){
        $value = $weight/pow(($height/100), 2);
        if($value < 18.5)
            return 1;
        if($value >= 18.5 && $value <= 24.9)
            return 2;
        if($value > 24.9)
            return 3;
    }
}
