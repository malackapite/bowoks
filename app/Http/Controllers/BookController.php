<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return Book::all();
    }

    public function show($id){
        return Book::find($id);
    }

    public function destroy($id){
        Book::find($id)->delete();
        //még nem létezik... most már igen
        return redirect('/book/list');
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->author = $request->author;
        $book->title = $request->title;
        $book->save();
        //még nem létezik...
        return redirect('/book/list');
    }

    public function store(Request $request){
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        $book->save();
        //még nem létezik...
        return redirect('/book/list');
    }

    //view függvények

    public function newView(){
        return view("book.new");
    }

    public function editView($id){
        return view("book.edit", ["book" => Book::find($id)]);
    }

    public function listView(){
        return view("book.list", ["books" => Book::all()]);
    }

    public function bookCopy(){
        return Book::with('copy')->get();
    }
}
