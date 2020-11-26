<?php


namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;
class UsersController
{
    public function index()
    {
        $users=User::all();
        return view('users.index',compact('users'));
    }

    public function edit($id){
        $user=User::find($id);
        return view('users.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


       $user=User::find($id);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->save();
        return redirect(route('user.edit', $id))->with('status', 'user updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            session()->flash('status', 'User Deleted');
        }
        return redirect('/users');
    }
}