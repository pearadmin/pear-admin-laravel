<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //后台布局
    public function layout()
    {
        $guard = Auth::guard('web')->user();
        //        $this->roles();
        return View::make('admin.layout',compact('guard'));
    }

    public function index()
    {
        return View::make('admin.index');
    }

    public function roles() {
        $roles = Auth::guard('web')->user()->getRoleNames();

        dd($roles);
    }
}
