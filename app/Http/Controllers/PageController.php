<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login']]);
    }

    public function page($path)
    {
        if (!$view = config('layadmin.page.view')) {// 配置错误
            return \view('layadmin::errors.404');
        }

        return \view($view);
    }

    public function login()
    {
        if (auth('sanctum')->check()) {
            return redirect('/');
        }

        return view('login');
    }

    public function errors404()
    {
        // 404 异常时重定向
        return \view('layadmin::errors.404');
    }

    public function errors500()
    {
        return \view('layadmin::errors.500');
    }
}
