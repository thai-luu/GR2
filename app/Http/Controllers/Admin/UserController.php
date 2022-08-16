<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $permission = $request->input('permission');
        $users =  User::withTrashed()->with('permissions', 'target', 'mode', 'level', 'physicalCondition');
        if($name){
            $name = '%'.$name.'%';
            $users->where('name', 'like', $name);
        }
        if($email){
            $email = '%'.$email.'%';
            $users->where('email', 'like', $email);
        }
        if($permission){
            $users->permission($permission);
        }  
        $users = $users->paginate(10);
        
        return UserResource::collection($users);
    }

    public function block(User $user)
    {
        $user->delete();
    }

    public function update(Request $request, User $user)
    {
        $password = $request->input('password');
        if($password){
            $input = [];
            $input['salt'] = md5(Str::random());
            $input['algorithm'] = 'sha1';
            $input['password'] = sha1($input['salt'] . e(trim($password)));
            $user->update($input);
        }
        $permissions = $request->input('permissions');
        if($permissions){
            $user->syncPermissions($permissions);
        }
    }

    public function unBlock($id)
    {
        User::withTrashed()->where('id', $id)->restore();
    }
}
