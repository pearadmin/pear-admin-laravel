<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendMail;

class MailController extends Controller
{

    /**
     * @param Request $request
     * @param int     $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendmail(Request $request,$type=0) {
        $res = Mail::to('454194741@qq.com')->send(new SendMail());
        dd($res);
        /*//$name = $request->get('name');
        $name = '我发的第一份邮件';
        switch ($type){
            case 1:
                //包含图片的邮件
                //$image = Storage::get('images/obama.jpg'); //本地文件
                $image = 'https://pc-index-skin.cdn.bcebos.com/hiphoto/66167199785.jpg?x-bce-process=image/crop,x_0,y_30,w_1668,h_1038';
                $ret = Mail::send('vendor.mail.image',['name'=>$name,'image'=>$image],function($message){
                    $to = '454194741@qq.com';$message->to($to)->subject('图片测试');
                });
                break;
            case 2:
                //包含附件的邮件
                $ret = Mail::send('vendor.mail.file',['name'=>$name],function($message){
                    $to = '454194741@qq.com';$message->to($to)->subject('邮件测试');
                    $attachment = Storage::get('xls/files/test.xls');
                    // 在邮件中上传附件
                    $message->attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('中文文档')."?=.xls"]);
                });
                break;
            case 3:
                //文本+图片+文件邮件
                $image = 'https://pc-index-skin.cdn.bcebos.com/hiphoto/66167199785.jpg?x-bce-process=image/crop,x_0,y_30,w_1668,h_1038';
                $ret = Mail::send('vendor.mail.full',['name'=>$name,'image'=>$image],function($message){
                    $to = '454194741@qq.com'; $message ->to($to)->subject('邮件测试');
                    $attachment = Storage::get('xls/files/test.xls');
                    // 在邮件中上传附件
                    $message->attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('中文文档')."?=.xls"]);
                });
                break;
            default:
                //纯文本邮件
                $ret = Mail::send('vendor.mail.text',['name'=>$name],function($message){
                    $to = '454194741@qq.com'; $message ->to($to)->subject('邮件测试');
                });
                break;
        }
        dd($ret);
        // 返回的一个错误数组，利用此可以判断是否发送成功
        if($ret){
            return Response::json(['code' => 500, 'msg' => '发送邮件成功，请查收！']);
        }else{
            return Response::json(['code' => 200, 'msg' => '发送邮件失败，请重试！']);
        }*/
    }
}
