<?php

use App\Http\Controllers\HadiahController;
use App\Http\Controllers\TokoController;
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

Route::get('/test', function(){
    return response([
        'message' => 'Api is Working'
    ], 200);
});

Route::get('toko', [TokoController::class, 'index']);
Route::put('toko/{id}', [TokoController::class, 'update']);

Route::get('hadiah', [HadiahController::class, 'index']);
Route::put('hadiah/{id}', [HadiahController::class, 'update']);