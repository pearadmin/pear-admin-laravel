<?php

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

Route::get('/', function () {
    return redirect()->to(\route('page.home'));
});

Route::group(['prefix' => config('layadmin.path_prefix')], function () {
    Route::get('/login', [PageController::class, 'login'])->name('page.login');
    Route::get('/home', [PageController::class, 'home'])->name('page.home');

    Route::get('/{path}', [PageController::class, 'page']);
});
