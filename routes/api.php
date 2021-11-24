<?php

use App\Http\Controllers\MenusController;
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
    Route::get('menu/tree', [MenusController::class, 'tree']);

    Route::get('routes', [RoutesController::class, 'index']);
    Route::put('routes', [RoutesController::class, 'sync']);
});
