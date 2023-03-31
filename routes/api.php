<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BukuController;

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
Route::get('/getmahasiswa',[MahasiswaController::class,'getmahasiswa']);
Route::get('/getbuku',[BukuController::class,'getbuku']);
Route::get('/getjurusan',[JurusanController::class,'getjurusan']);
Route::post('/createmahasiswa',[MahasiswaController::class,'createmahasiswa']);
Route::post('/createbuku',[BukuController::class,'createbuku']);
Route::post('/createjurusan',[JurusanController::class,'createjurusan']);
Route::put('/updatemahasiswa/{id}',[MahasiswaController::class,'updatemahasiswa']);
Route::put('/updatebuku/{id}',[BukuController::class,'updatebuku']);
Route::put('/updatejurusan/{id}',[JurusanController::class,'updatejurusan']);
Route::delete('/deletemahasiswa/{id}',[MahasiswaController::class,'deletemahasiswa']);
Route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);
Route::delete('/deletejurusan/{id}',[JurusanController::class,'deletejurusan']);
