<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index(){
        return Lending::all();
    }

    public function show($user_id, $copy_id, $start){
        return Lending::where("user_id",$user_id)->where("copy_id", $copy_id)->where("start", $start)->first();
    }

    public function destroy($user_id, $copy_id, $start){
        Lending::show($user_id, $copy_id, $start)->delete();
        //még nem létezik... most már igen
        return redirect('/lending/list');
    }

    public function store(Request $request){
        $lending = new Lending();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
        //még nem létezik...
        return redirect('/lending/list');
    }

    //view függvények

    public function newView(){
        return view("lending.new");
    }

    public function listView(){
        return view("lending.list",);
    }
}
