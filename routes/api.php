<?php

use App\Http\Controllers\SiswaController;
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

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa/create', [SiswaController::class, 'store']);
Route::get('/siswa/show/{id_siswa}', [SiswaController::class, 'show']);
Route::post('/siswa/update/{id_siswa}', [SiswaController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
