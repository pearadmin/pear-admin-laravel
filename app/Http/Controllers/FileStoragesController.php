<?php

namespace App\Http\Controllers;

use App\Models\FileStorages;
use App\Utils\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\URL;
use Validator;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileStoragesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @author: hongbinwang
     * @time  : 2021/8/12 23:03
     */
	public function upload(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'file'    => 'required|file',
		]);
		if ($validator->fails()) {
			return response()->json([
				'code'    => 500,
				'msg' => $validator->errors()->first(),
			]);
		}

		$storage = Storage::disk('public');
		$file_obj = $request->file;
		$file_path = 'files/'.date('Ymd');
		$original_name = $file_obj->getClientOriginalName();
		$hash_name = md5(Hash::make($original_name));
		$filename = $hash_name. '.' .$file_obj->getClientOriginalExtension();
		$path = $storage->putFileAs($file_path, $file_obj, $filename);

		$resData = array(
			'base_url' => '',
			'path' => $path,
			'link' => $storage->url($path),
			'type' => $storage->mimeType($path),
			'size' => $storage->size($path),
			'name' => $filename,
			'original_name' => $original_name,
			'upload_ip' => $request->getClientIp(),
			'hash' => Hash::make($original_name),
		);
		if (!Redis::exists($filename)) {
			Redis::setex($filename, Helper::HOUR_IN_SECOND, serialize($resData));
		}
		return response()->json([
			"code"     => 200,
			"msg"  => '文件上传成功！',
			"data"     => [
				'name' => $filename,
				'original_name' => $original_name,
				'link' => $storage->url($path),
			]
		]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @author: hongbinwang
     * @time  : 2021/8/12 23:03
     */
	public function delete(Request $request){
		$file = FileStorages::where(function($query) use ($request){
			$query->where('name', $request->name)
				->orWhere('original_name', $request->name);
		})->where('link', $request->url)->first();

		if (!$file){
			//文件未入库 直接删除
			//删除redis缓存
			if (Redis::get($request->name)) Redis::del($request->name);
			return response()->json([
				"code"     => 200,
				"msg"  => '文件删除成功',
			]);
		}else{
			$storage = Storage::disk('public');
			if ($storage->exists($file->path)){
				$storage->delete($file->path);
				$file->delete();
				//文件存在 删除
				return response()->json([
					"code"     => 200,
					"msg"  => '文件删除成功',
					"data"  => $file->id,
				]);
			} else {
				//文件不存在
				return response()->json([
					"code"     => 500,
					"msg"  => '文件不存在',
				]);
			}
		}

	}

    /**
     * 创建文件 （生成证书）
     * @param string $background
     * @param array  $data
     * @return string|null
     *
     * @author: hongbinwang
     * @time  : 2021/8/14 15:22
     */
    public function create($background='',$data = array())
    {
        $img = Image::make($background); //背景图的地址
        $data = array(
            [
                'text' => '张三',
                'size' => '20',
                'color' => '#000000',
                'align' => 'center',
                'valign' => 'top',
                'angle' => 45,
                'coord_x' => '112',//X位置坐标
                'coord_y' => '36', //Y位置坐标
            ],
            [
                'text' => '安师大收到',
                'size' => '22',
                'color' => '#000000',
                'align' => 'center',
                'valign' => 'top',
                'angle' => 45,
                'coord_x' => '112',//X位置坐标
                'coord_y' => '36', //Y位置坐标
            ],
        );
        foreach ($data as $val){
            $img->text($val['text'], $val['coord_x'], $val['coord_y'], function ($font) use ($val){
                $font->file(public_path('/fonts/msyh.ttf'));
                $font->size($val['size']);
                $font->color($val['color']);
                $font->align('center');
                $font->valign('top');
                $font->angle(45);
            });
        }
        $hash_name = md5(Hash::make(time().'.png'));
        $filename = $hash_name. '.png';
        $img->save("uploads/".$filename); //暂存到该目录
        $storage = Storage::disk('public');
        $move_path = 'certs/'.date('Ymd').'/'.$filename;
        $storage->move("uploads/".$filename, $move_path); //移动到文件目录

        if (Storage::exists($move_path)) return $move_path;
        return null;
    }
}
