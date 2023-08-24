<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\TipousuarioController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\GrupomenuController;
use App\Http\Controllers\Api\OpcionmenuController;
use App\Http\Controllers\Api\AccesoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UbigeoController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ProcesoController;
use App\Http\Controllers\Api\BienController;
use App\Http\Controllers\Api\EtapaController;
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
    Route::apiResource('grupomenu', GrupomenuController::class);
    Route::apiResource('opcionmenu', OpcionmenuController::class);
    Route::apiResource('acceso', AccesoController::class);
    Route::post('tipousuario/acceso',[TipousuarioController::class,'acceso']);
    Route::post('logout', [LoginController::class, 'logout']);

    Route::apiResource('usuario', UsuarioController::class);
    Route::apiResource('proceso', ProcesoController::class);
    Route::apiResource('bien', BienController::class);
    Route::apiResource('etapa', EtapaController::class);
    Route::post('proceso/store2', [ProcesoController::class,'store2'])->name('proceso.store2');
});
Route::get('distrito',[UbigeoController::class,'distrito']);
Route::get('provincia',[UbigeoController::class,'provincia']);
Route::get('departamento',[UbigeoController::class,'departamento']);

Route::get('proceso',[ProcesoController::class,'list'])->name('proceso.list');

Route::post('usuario/store2', [UsuarioController::class,'store2'])->name('usuario.store2');