<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserContoller extends Controller
{
    public function index(){
        return User::all();
    }

    public function show($id){
        return User::find($id);
    }

    public function destroy($id){
        User::find($id)->delete();
        //még nem létezik... most már igen
        return redirect('/user/list');
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
        //még nem létezik...
        return redirect('/user/list');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
        //még nem létezik...
        return redirect('/user/list');
    }

    //view függvények

    public function newView(){
        return view("user.new");
    }

    public function editView($id){
        return view("user.edit", ["user" => User::find($id)]);
    }

    public function listView(){
        return view("user.list", ["books" => User::all()]);
    }
}
