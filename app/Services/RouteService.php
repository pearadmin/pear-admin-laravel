<?php

namespace App\Services;

use App\Console\Commands\Layadmin\SyncRoutes;
use App\Repositories\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RouteService extends Service
{
    public function searchPage(Request $request)
    {
        return Route::paginate($request['limit'] ?? 20);
    }

    public function syncRoutes()
    {
        Artisan::call(SyncRoutes::class);
    }
}
