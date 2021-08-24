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

    /**
     * @return Application|Factory|View
     *
     * @author: hongbinwang
     * @time  : 2021/8/2 22:20
     */
    public function fwfw()
    {
        return view('home.fwfw');
    }

    /**
     * @return Application|Factory|View
     *
     * @author: hongbinwang
     * @time  : 2021/8/2 22:20
     */
    public function gywm()
    {
        return view('home.gywm');
    }
    /**
     * @return Application|Factory|View
     *
     * @author: hongbinwang
     * @time  : 2021/8/2 22:20
     */
    public function xwzx()
    {
        return view('home.xwzx');
    }

    /**
     * @return Application|Factory|View
     *
     * @author: hongbinwang
     * @time  : 2021/8/2 22:20
     */
    public function lxwm()
    {
        return view('home.lxwm');
    }

    /**
     * @return Application|Factory|RedirectResponse|Redirector|View
     *
     * @author: hongbinwang
     * @time  : 2021/8/2 22:19
     */
    public function login(){
        if(!empty(auth('member')->user()->id)){
            return redirect('/');
        }
        return view('home.login');
    }

}
