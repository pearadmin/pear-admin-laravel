<?php

use Illuminate\Http\Request;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//文件上传接口
Route::post('upload_file', 'FileStoragesController@upload')->name('api.upload_file');
Route::post('delete_file', 'FileStoragesController@delete')->name('api.delete_file');
Route::post('create_file', 'FileStoragesController@create')->name('api.create_file');


//邮件发送接口
Route::any('sendmail/{type}','MailController@sendmail')->name('api.sendmail');


//留言板
Route::get('message', 'MessagesController@panel')->name('api.message');
