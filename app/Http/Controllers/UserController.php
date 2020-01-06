<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function UpdateUser(Request $request){
        $id=$request['id'];
        $user=User::where('id',$id)->firstOrFail();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->update();
        return redirect()->route("user")->with('info',"The selected user have been updated.");
    }
    public function getEdit($id){
        $user=User::whereId($id)->firstOrFail();
        return view("user.edit_user")->with(['user'=>$user]);
    }
    public function getDropUser($id){
        $user=User::whereId($id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with('info',"The selected user have been delete.");

    }
    public function postAssignUserRole(Request $request){
        $user_id=$request['user_id'];
        $role=$request['role'];
        $user=User::whereId($user_id)->firstOrFail();
        $user->syncRoles($role);
        return redirect()->back()->with('info', "The selected user role have been changed.");
    }
    public function getUsers(){
        $user=User::get();
        $roles=Role::get();
        return view("user.all_user")->with(['users'=>$user, 'roles'=>$roles]);
    }
}
