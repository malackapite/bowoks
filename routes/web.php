<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/book', [BookController::class, 'index']);
Route::get('/api/book/{id}', [BookController::class, 'show']);
Route::put('/api/book/{id}', [BookController::class, 'update']);
Route::post('/api/book', [BookController::class, 'store']);
Route::delete('/api/book/{id}', [BookController::class, 'destroy']);
//view útvonalak
Route::get('/book/new', [BookController::class, "newView"]);
Route::get('/book/list', [BookController::class, "listView"]);
Route::get('/book/edit/{id}', [BookController::class, "editView"]);


Route::get('/api/copy', [CopyController::class, 'index']);
Route::get('/api/copy/{id}', [CopyController::class, 'show']);
Route::put('/api/copy/{id}', [CopyController::class, 'update']);
Route::post('/api/copy', [CopyController::class, 'store']);
Route::delete('/api/copy/{id}', [CopyController::class, 'destroy']);
//view útvonalak
Route::get('/copy/new', [CopyController::class, "newView"]);
Route::get('/copy/list', [CopyController::class, "listView"]);
Route::get('/copy/edit/{id}', [CopyController::class, "editView"]);