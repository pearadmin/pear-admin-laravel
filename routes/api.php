<?php

use App\Http\Controllers\MenusController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\RoutesController;
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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('options/{keyword}', [OptionsController::class, 'options']);

    Route::get('menu/tree', [MenusController::class, 'tree']);
    Route::get('menus', [MenusController::class, 'index']);
    Route::get('menus/{id}', [MenusController::class, 'show']);
    Route::put('menus/{id}', [MenusController::class, 'update']);
    Route::post('menus', [MenusController::class, 'store']);
    Route::delete('menus/{id}', [MenusController::class, 'destroy']);

    Route::get('routes', [RoutesController::class, 'index']);
    Route::put('routes', [RoutesController::class, 'sync']);
});
