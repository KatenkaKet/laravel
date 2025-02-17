<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/corpuses', [\App\Http\Controllers\CorpusControllerApi::class, 'index']);
Route::get('/corpus/{id}', [\App\Http\Controllers\CorpusControllerApi::class, 'show']);

//Route::middleware('auth:sanctum')->get('/room', [\App\Http\Controllers\RoomControllerApi::class, 'index']);
Route::get('/room/{id}', [\App\Http\Controllers\RoomControllerApi::class, 'show']);

Route::get('/guest/', [\App\Http\Controllers\GuestControllerApi::class, 'index']);
Route::get('/guest/{id}', [\App\Http\Controllers\GuestControllerApi::class, 'show']);

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->get('/user', function(Request $request){
//   return $request->user();
//});

//Route::middleware('auth:sanctum')->get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);


Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/room', [\App\Http\Controllers\RoomControllerApi::class, 'index']);
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
