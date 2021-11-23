<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$prefix = config('layadmin.path.prefix');

Route::get('/', function () use ($prefix) {
    return redirect()->to(\route("$prefix.page", ['path' => 'home']));
});

// 后台视图路由
Route::group(['prefix' => $prefix], function () use ($prefix) {
    Route::get('/login', [PageController::class, 'login'])->name("$prefix.page.login");

    Route::get('/errors/404', [PageController::class, 'errors404'])->name("$prefix.errors.404");
    Route::get('/errors/500', [PageController::class, 'errors500'])->name("$prefix.errors.500");

    Route::get('/{path}', [PageController::class, 'page'])->where('path','.+')->name("$prefix.page");
});

Route::post('/login', [AuthController::class,'login']);
Route::delete('/logout', [AuthController::class,'logout']);
