<?php

namespace App\Http\Controllers\Home;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     *
     * @author: hongbinwang
     * @time  : 2021/8/2 22:20
     */
    public function index()
    {
        // exit('hello world');
        return view('home.index');
    }

}
