<?php

use App\Http\Controllers\CorpusController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\LoginController;

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
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/', function () {
    return view('welcome');
});



Route::get('/hello', function (){
    return view('hello', ['title' => 'Hello world!']);
});
Route::get('/corpuses', [CorpusController::class, 'index']);
Route::get('/corpus/{id}', [CorpusController::class, 'show']);
Route::post('/room', [\App\Http\Controllers\RoomController::class, 'store']);
Route::get('/room', [\App\Http\Controllers\RoomController::class, 'index']);
Route::get('/guest/{id}', [\App\Http\Controllers\GuestController::class, 'show'])->middleware('auth');
Route::get('/room/create', [\App\Http\Controllers\RoomController::class, 'create'])->middleware('auth');
Route::get('/room/{id}', [\App\Http\Controllers\RoomController::class, 'show'])->middleware('auth');
Route::get('room/destroy/{id}', [\App\Http\Controllers\RoomController::class, 'destroy'])->middleware('auth');
Route::get('room/edit/{id}', [\App\Http\Controllers\RoomController::class, 'edit'])->middleware('auth');
Route::post('room/update/{id}', [\App\Http\Controllers\RoomController::class, 'update'])->middleware('auth');


Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/error', function (){
    return view('error', ['message' => session('message')]);
});

