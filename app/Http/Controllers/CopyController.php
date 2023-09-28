<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copy;
use App\Models\User;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index(){
        return Copy::all();
    }

    public function show($id){
        return Copy::find($id);
    }

    public function destroy($id){
        Copy::find($id)->delete();
        //még nem létezik... most már igen
        return redirect('/copy/list');
    }

    public function update(Request $request, $id){
        $copy = Copy::find($id);
        $copy->user_id = $request->user_id;
        $copy->book_id = $request->book_id;
        $copy->save();
        //még nem létezik...
        return redirect('/copy/list');
    }

    public function store(Request $request){
        $copy = new Copy();
        $copy->user_id = $request->user_id;
        $copy->book_id = $request->book_id;
        $copy->save();
        //még nem létezik...
        return redirect('/copy/list');
    }

    //view függvények

    public function newView(){
        return view("copy.new", ["books" => Book::all(), "users" => User::all()]);
    }

    public function editView($id){
        return view("copy.edit", ["copy" => Copy::find($id), "books" => Book::all(), "users" => User::all()]);
    }

    public function listView(){
        return view("copy.list", ["copies" => Copy::all()]);
    }
}
