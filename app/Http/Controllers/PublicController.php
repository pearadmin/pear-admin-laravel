<?php
namespace App\Http\Controllers;

use App\Traits\Msg;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    use Msg;

    //验证图形验证码
    public function verifyCaptcha(Request $request)
    {
        return captcha_check($request->get('captcha'));
    }
}
