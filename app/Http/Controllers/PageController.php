<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login']]);
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
        if (auth()->check()) {
            return redirect(route('home'));
        }

        return view('login');
    }
}
