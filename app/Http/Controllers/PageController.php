<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Jiannei\LayAdmin\Support\Facades\LayAdmin;
use Jiannei\Response\Laravel\Support\Facades\Response;

class PageController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function page($path)
    {
        return View::exists($path) ? view($path) : view('layadmin::errors.404');
    }

    public function home()
    {
        return view('home');
    }

    public function login()
    {
        if (auth('admin')->check()) {
            return redirect(route('page.home'));
        }

        return view('login');
    }
}
