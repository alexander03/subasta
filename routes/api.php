<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\TipousuarioController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\LoginController;
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

/*Route::middleware('auth:sanctum')->get('/authenticate', function (Request $request) {
    return $request->user();
});*/


Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('authenticate',[LoginController::class,'authenticate']);
    Route::apiResource('categoria', CategoriaController::class);
    Route::apiResource('tipousuario', TipousuarioController::class);
    Route::apiResource('producto', ProductoController::class);
    Route::post('logout', [LoginController::class, 'logout']);
});