<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;
use Krlove\EloquentModelGenerator\Provider\GeneratorServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(GeneratorServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //左侧菜单
        view()->composer('admin.layout',function($view){
            $menus = \App\Models\Backend\Permission::with(['childs'])->where('parent_id',0)->orderBy('sort','desc')->get();
            $view->with('menus',$menus);
        });

        // 多态映射表
        Relation::morphMap([
            'article' => 'App\Models\Backend\Article',
            'service' => 'App\Models\Backend\Service',
        ]);
    }
}
