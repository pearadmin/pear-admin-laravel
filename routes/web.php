<?php

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

use Illuminate\Support\Facades\Artisan;

//清除缓存
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');  //清除配置文件缓存
    Artisan::call('cache:clear');   //清除缓存
    Artisan::call('view:clear');    //清理视图缓存
    return "缓存已清除! ";
});

//测试命令行
Route::get('/command', function() {
    Artisan::call('init_send_data_files');
});

//留言提交接口
Route::post('/message', 'MessagesController@create')->name('message');

//首页
Route::get('/','Home\IndexController@index')->name('home');
