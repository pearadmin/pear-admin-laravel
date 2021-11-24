<?php

namespace App\Console\Commands\Layadmin;

use App\Repositories\Models\Route;
use Illuminate\Console\Command;
use Illuminate\Foundation\Console\RouteListCommand;

class SyncRoutes extends RouteListCommand
{
    protected $name = 'layadmin:sync-routes';

    protected $description = '同步路由到数据库';


    public function handle()
    {
        $this->info('正在同步路由到数据库...');

        if (empty($routes = $this->getRoutes())) {
            return $this->error("Your application doesn't have any routes matching the given criteria.");
        }

        collect(json_decode($this->asJson($routes), true))->map(function ($route) {
            Route::updateOrCreate(['method' => $route['method'], 'uri' => $route['uri']], $route);
        });

        $this->info('同步路由到数据库成功！');

        return Command::SUCCESS;
    }

}
