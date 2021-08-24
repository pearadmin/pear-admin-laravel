<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Backend\Config;
use App\Models\Backend\LoginLog;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Backend\Role;
use App\Models\Backend\Permission;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * 用户登录表单
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm(Request $request)
    {
        return View::make('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Http\Response|JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // 如果该类使用ThrottlesLogins特征，我们可以自动限制此应用程序的登录尝试。我们将通过向这些应用程序发出这些请求的客户端的用户名和IP地址来对此进行键入。
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if($this->sendLoginResponse($request)){
                return response()->json(['code' => 200,'msg'=>'登录成功', 'redirect'=>route('admin.layout')], '200');
            }else{
                return response()->json(['code' => 500,'msg'=>'登录失败', 'redirect'=>route('admin.login')], '200');
            }
            //            return $this->sendLoginResponse($request);
        }

        // 如果登录尝试失败，我们将增加登录尝试的次数，并将用户重定向回登录表单。当然，当该用户超过最大尝试次数时，他们将被锁定。
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    /**
     * 用户登录表单
     * @return \Illuminate\Contracts\View\View
     */
    public function retrievePasswordForm()
    {
        return View::make('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Http\Response|JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function retrievePassword(Request $request)
    {
        $this->validateLogin($request);

        // 如果该类使用ThrottlesLogins特征，我们可以自动限制此应用程序的登录尝试。我们将通过向这些应用程序发出这些请求的客户端的用户名和IP地址来对此进行键入。
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if($this->sendLoginResponse($request)){
                return response()->json(['code' => 200,'msg'=>'登录成功', 'redirect'=>route('admin.layout')], '200');
            }else{
                return response()->json(['code' => 500,'msg'=>'登录失败', 'redirect'=>route('admin.login')], '200');
            }
            //            return $this->sendLoginResponse($request);
        }

        // 如果登录尝试失败，我们将增加登录尝试的次数，并将用户重定向回登录表单。当然，当该用户超过最大尝试次数时，他们将被锁定。
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    /**
     * 验证登录字段
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'captcha' => 'required|captcha',
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    //登录成功后的跳转地址
    public function redirectTo()
    {
        return URL::route('admin.layout');
    }

    /**
     * 退出后的动作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function loggedOut(Request $request)
    {
        return Redirect::to(URL::route('admin.auth.login'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    protected function authenticated(Request $request, $user)
    {
        //缓存配置信息
        $config = Config::pluck('val','key');
        $request->session()->put('config',$config);
        //记录登录成功日志
        if (isset($config['login_log']) && $config['login_log']==1){
            LoginLog::create([
                'username' => $user->username,
                'ip' => $request->ip(),
                'method' => $request->method(),
                'user_agent' => $request->header('User-Agent'),
                'remark' => '登录成功',
            ]);
        }
    }

    /**
     * 用于登录的字段
     * @return string
     */
    public function username()
    {
        return 'username';
    }


}
