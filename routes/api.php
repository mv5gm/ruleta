<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('animalito',[App\Http\Controllers\AnimalitoController::class,'get_animalitos']);

Route::get('loteria',[App\Http\Controllers\LoteriaController::class,'get_loteria']);
Route::get('animalito',[App\Http\Controllers\AnimalitoController::class,'get_animalito']);
Route::get('sorteo',[App\Http\Controllers\SorteoController::class,'get_sorteo']);
Route::get('bancas',[App\Http\Controllers\BancaController::class,'get_bancas']);
Route::get('hora',function(){
	return date('Y-m-d H:m:s');
});