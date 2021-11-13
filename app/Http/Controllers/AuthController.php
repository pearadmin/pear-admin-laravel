<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jiannei\Response\Laravel\Support\Facades\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'name' => $request->get('username'),
            'password' => $request->get('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Response::ok('登录成功');
        }

        Response::errorUnauthorized();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Response::ok('注销成功');
    }
}
