<?php

namespace App\Http\Controllers;

use Curder\LaravelAliyunSms\AliyunSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{

    //文件上传
    public function upload(Request $request)
    {
        //上传文件最大大小,单位M
        $maxSize = 50;
        //支持的上传图片类型
        $allowed_extensions = ["png", "jpg", "gif"];
        //返回信息json
        $data = ['code'=>500, 'msg'=>'上传失败', 'data'=>''];
        $file = $request->file('file');
        //检查文件是否上传完成
        if ($file->isValid()){
            //检测图片类型
            $ext = $file->getClientOriginalExtension();
//            if (!in_array(strtolower($ext),$allowed_extensions)){
//                $data['msg'] = "请上传".implode(",",$allowed_extensions)."格式的图片";
//                return response()->json($data);
//            }
            if ($file->getSize() > $maxSize*1024*1024){
                $data['msg'] = "文件大小限制".$maxSize."M";
                return response()->json($data);
            }
        }else{
            $data['msg'] = $file->getErrorMessage();
            return response()->json($data);
        }
        $newFile = date('Y-m-d')."_".time()."_".uniqid().".".$file->getClientOriginalExtension();
        $disk = Storage::disk('uploads');
        $res = $disk->put($newFile,file_get_contents($file->getRealPath()));
        if($res){
            $data = [
                'code'  => 200,
                'msg'   => '上传成功',
                'data'  => $newFile,
                'url'   => '/uploads/local/'.$newFile,
            ];
        }else{
            $data['data'] = $file->getErrorMessage();
        }
        return response()->json($data);
    }

    /**
     * 删除图片或文件
     * @param string $request 图片或文件地址
     */
    public function delpic(Request $request)
    {
        $accept = $request->all();
        if ($accept['pic']) {
            if (file_exists(public_path().$accept['pic'])) {
                $res = unlink(public_path().$accept['pic']);
                if ($res) {
                    $return = array('code' => 200, 'data' => '删除图片成功');
                } else {
                    $return = array('code' => 200, 'data' => '操作失误导致图片或文件无法删除');
                }
            } else {
                $return = array('code' => 404, 'data' => '请传送正确图片或文件地址');
            }
            return $return;
        }
    }

    public function sendMsg(){
//        string $mobile -> 短信接受手机号
//        string $tplId -> 模板签名id，需要在阿里云后台申请，并通过审核才可以使用
//        array $params -> 发送参数
//        $smsService = App::make(Curder\LaravelAliyunSms\AliyunSms::class);
//        $smsService->send(strval($mobile), $tplId , $params);
    }
}
