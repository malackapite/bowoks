<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Raw;

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

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "password" => 'string|min:3|max:50'
        ]);

        // $validator = Validator::make($request->all(), [
        //     "password" => array('required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[^\s]{8,}$/')
        //          ]);

        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }
        $user = User::where("id", $id)->update([
            "password" => Hash::make($request->password),
        ]);
        return response()->json(["user" => $user]);
    }
        
    public function userLendings(){
        $user = Auth::user();
        return User::with('lending')->where('id','=',$user->id)->get();
    }

    public function hanykonyv(){
        $user = Auth::user();
        return User::with('lending')->where('id','=',$user->id)->count();
    }
}
