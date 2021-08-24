<?php

/*
|--------------------------------------------------------------------------
| 后台路由
|--------------------------------------------------------------------------
|
| 统一命名空间 Admin
| 统一前缀 admin
| 用户认证统一使用 auth 中间件
| 权限认证统一使用 permission:权限名称
|
*/

/*
|--------------------------------------------------------------------------
| 用户登录、退出、更改密码
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin/user'], function () {
    //登录
    Route::get('login','AuthController@showLoginForm')->name('admin.auth.loginForm');
    Route::post('login','AuthController@login')->name('admin.auth.login');
    //找回密码
    Route::get('forgot_password','AuthController@forgotPasswordForm')->name('admin.user.forgotPasswordForm');
    Route::post('forgot_password','AuthController@forgotPassword')->name('admin.user.forgotPassword');
});

/*
|--------------------------------------------------------------------------
| 后台公共页面
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    //后台布局
    Route::get('/','IndexController@layout')->name('admin.layout');
    //后台首页
    Route::get('/index','DatacenterController@index')->name('admin.index');
    //后台菜单
    Route::get('/menu','PermissionController@menu')->name('admin.menu');
    //基础资料
    Route::get('/profile','UserController@profile')->name('admin.profile');
    //更改密码
    Route::get('/change_my_password_form','UserController@passwordForm')->name('admin.passwordForm');
    Route::post('/change_my_password','UserController@password')->name('admin.password');
    //退出
    Route::get('/logout','UserController@logout')->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| 控制中心模块
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    //控制中心
    Route::get('datacenter', 'DatacenterController@index')->name('admin.datacenter');
    Route::get('message', '\App\Http\Controllers\MessagesController@index')->name('admin.message');
    Route::get('message/data', '\App\Http\Controllers\MessagesController@data')->name('admin.message.data');
    Route::post('message/read', '\App\Http\Controllers\MessagesController@index')->name('admin.message.read');
});

/*
|--------------------------------------------------------------------------
| 资讯管理模块
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    //文章管理
    Route::group(['middleware' => []], function () {
        Route::get('article/data', 'ArticleController@data')->name('admin.article.data');
        Route::get('article', 'ArticleController@index')->name('admin.article');
        //添加
        Route::get('article/create', 'ArticleController@create')->name('admin.article.create');
        Route::post('article/store', 'ArticleController@store')->name('admin.article.store');
        //编辑
        Route::get('article/{id}/edit', 'ArticleController@edit')->name('admin.article.edit');
        Route::put('article/{id}/update', 'ArticleController@update')->name('admin.article.update');
        //删除
        Route::delete('article/destroy', 'ArticleController@destroy')->name('admin.article.destroy');
    });
    //标签管理
    Route::group(['middleware' => []], function () {
        Route::get('tag', 'TagController@index')->name('admin.tag');
        //添加
        Route::get('tag/create', 'TagController@create')->name('admin.tag.create');
        Route::post('tag/store', 'TagController@store')->name('admin.tag.store');
        //编辑
        Route::get('tag/{id}/edit', 'TagController@edit')->name('admin.tag.edit');
        Route::put('tag/{id}/update', 'TagController@update')->name('admin.tag.update');
        //删除
        Route::delete('tag/destroy', 'TagController@destroy')->name('admin.tag.destroy');
    });
    //分类管理
    Route::group(['middleware' => []], function () {
        Route::get('category/data', 'CategoryController@data')->name('admin.category.data');
        Route::get('category', 'CategoryController@index')->name('admin.category');
        //添加分类
        Route::get('category/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('category/store', 'CategoryController@store')->name('admin.category.store');
        //编辑分类
        Route::get('category/{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
        Route::put('category/{id}/update', 'CategoryController@update')->name('admin.category.update');
        //删除分类
        Route::delete('category/destroy', 'CategoryController@destroy')->name('admin.category.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| 系统管理模块
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {

    //用户管理
    Route::group(['middleware'=>[]],function (){
        Route::get('user','UserController@index')->name('admin.user');
        Route::get('user/data','UserController@data')->name('admin.user.data');
        //添加
        Route::get('user/create','UserController@create')->name('admin.user.create');
        Route::post('user/store','UserController@store')->name('admin.user.store');
        //编辑
        Route::get('user/{id}/edit','UserController@edit')->name('admin.user.edit');
        Route::put('user/{id}/update','UserController@update')->name('admin.user.update');
        //删除
        Route::delete('user/destroy','UserController@destroy')->name('admin.user.destroy');
        //分配角色
        Route::get('user/{id}/role','UserController@role')->name('admin.user.role');
        Route::put('user/{id}/assignRole','UserController@assignRole')->name('admin.user.assignRole');
        //分配权限
        Route::get('user/{id}/permission','UserController@permission')->name('admin.user.permission');
        Route::get('user/{id}/permissionTree','UserController@permissionTree')->name('admin.user.permissionTree');
        Route::put('user/{id}/assignPermission','UserController@assignPermission')->name('admin.user.assignPermission');
    });

    //角色管理
    Route::group(['middleware'=>[]],function (){
        Route::get('role','RoleController@index')->name('admin.role');
        Route::get('role/data','RoleController@data')->name('admin.role.data');
        //添加
        Route::get('role/create','RoleController@create')->name('admin.role.create');
        Route::post('role/store','RoleController@store')->name('admin.role.store');
        //编辑
        Route::get('role/{id}/edit','RoleController@edit')->name('admin.role.edit');
        Route::put('role/{id}/update','RoleController@update')->name('admin.role.update');
        //删除
        Route::delete('role/destroy','RoleController@destroy')->name('admin.role.destroy');
        //分配权限
        Route::get('role/{id}/permission','RoleController@permission')->name('admin.role.permission');
        Route::get('role/{id}/permissionTree','RoleController@permissionTree')->name('admin.role.permissionTree');
        Route::put('role/{id}/assignPermission','RoleController@assignPermission')->name('admin.role.assignPermission');
    });

    //权限组
    Route::group(['middleware'=>[]],function (){
        Route::get('permission_group','PermissionGroupController@index')->name('admin.permission_group');
        Route::get('permission_group/data','PermissionGroupController@data')->name('admin.permission_group.data');
        //添加
        Route::get('permission_group/create','PermissionGroupController@create')->name('admin.permission_group.create');
        Route::post('permission_group/store','PermissionGroupController@store')->name('admin.permission_group.store');
        //编辑
        Route::get('permission_group/{id}/edit','PermissionGroupController@edit')->name('admin.permission_group.edit');
        Route::put('permission_group/{id}/update','PermissionGroupController@update')->name('admin.permission_group.update');
        //删除
        Route::delete('permission_group/destroy','PermissionGroupController@destroy')->name('admin.permission_group.destroy');
    });
    //权限管理
    Route::group(['middleware'=>[]],function (){
        Route::get('permission','PermissionController@index')->name('admin.permission');
        Route::get('permission/data','PermissionController@data')->name('admin.permission.data');
        Route::get('permission/dtree','PermissionController@dtree')->name('admin.permission.dtree');

        //添加
        Route::get('permission/create','PermissionController@create')->name('admin.permission.create');
        Route::post('permission/store','PermissionController@store')->name('admin.permission.store');
        //编辑
        Route::get('permission/{id}/edit','PermissionController@edit')->name('admin.permission.edit');
        Route::put('permission/{id}/update','PermissionController@update')->name('admin.permission.update');
        //删除
        Route::delete('permission/destroy','PermissionController@destroy')->name('admin.permission.destroy');
    });

    //字典管理
    Route::group(['middleware' => []], function () {
        Route::get('dictionary/data', 'DictionaryController@data')->name('admin.dictionary.data');
        Route::get('dictionary', 'DictionaryController@index')->name('admin.dictionary');
        //添加字典
        Route::get('dictionary/create', 'DictionaryController@create')->name('admin.dictionary.create');
        Route::post('dictionary/store', 'DictionaryController@store')->name('admin.dictionary.store');
        //编辑字典
        Route::get('dictionary/{id}/edit', 'DictionaryController@edit')->name('admin.dictionary.edit');
        Route::put('dictionary/{id}/update', 'DictionaryController@update')->name('admin.dictionary.update');
        //删除字典
        Route::delete('dictionary/destroy', 'DictionaryController@destroy')->name('admin.dictionary.destroy');
    });

    //行为日志
    Route::group(['middleware'=>[]],function (){
        Route::get('log','LogController@index')->name('admin.log');
        Route::get('login_log/data','LogController@data_login')->name('admin.login_log.data');
        Route::get('operate_log/data','LogController@data_operate')->name('admin.operate_log.data');
        Route::delete('login_log/destroy','LogController@destroy_login')->name('admin.login_log.destroy');
        Route::delete('operate_log/destroy','LogController@destroy_operate')->name('admin.operate_log.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| 系统配置模块
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {

    //配置组
    Route::group(['middleware' => []], function () {
        Route::get('config_group', 'ConfigGroupController@index')->name('admin.config_group');
        Route::get('config_group/data', 'ConfigGroupController@data')->name('admin.config_group.data');
        //添加
        Route::get('config_group/create', 'ConfigGroupController@create')->name('admin.config_group.create');
        Route::post('config_group/store', 'ConfigGroupController@store')->name('admin.config_group.store');
        //编辑
        Route::get('config_group/{id}/edit', 'ConfigGroupController@edit')->name('admin.config_group.edit');
        Route::put('config_group/{id}/update', 'ConfigGroupController@update')->name('admin.config_group.update');
        //删除
        Route::delete('config_group/destroy', 'ConfigGroupController@destroy')->name('admin.config_group.destroy');
    });

    //配置项
    Route::group(['middleware' => []], function () {
        Route::get('config/frontend', 'ConfigController@index_fe')->name('admin.config.fe');
        Route::get('config/backend', 'ConfigController@index_be')->name('admin.config.be');
        //添加
        Route::get('config/create', 'ConfigController@create')->name('admin.config.create');
        Route::post('config/store', 'ConfigController@store')->name('admin.config.store');
        //编辑
        Route::put('config/update', 'ConfigController@update')->name('admin.config.update');
        //删除
        Route::delete('config/destroy', 'ConfigController@destroy')->name('admin.config.destroy');
    });
});
