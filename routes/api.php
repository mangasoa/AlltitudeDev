<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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


/*Route::middleware('api')->group(function () {
    Route::resource('clients', App\Http\Controllers\ClientController::class);
});
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware('api')->group(function () {
    Route::get('/clients',[ClientController::class, 'index']);
    Route::get('/clients/desc',[ClientController::class, 'listDesc']);
    Route::get('/clients/asc',[ClientController::class, 'listAsc']);
    Route::post('/clients/store', [ClientController::class, 'store']);
    Route::put('/client/{id}', [ClientController::class, 'update']);
    Route::delete('/client/{id}', [ClientController::class, 'destroy']);
});

