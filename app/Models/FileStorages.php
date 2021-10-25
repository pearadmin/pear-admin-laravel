<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use App\Utils\Helper;

class FileStorages extends Model
{
	use SoftDeletes;

	CONST STATUS_INVALID = 0;	// 无效
	CONST STATUS_PUBLIC  = 10;	// 公开
	CONST STATUS_PRIVATE = 20;	// 私有

	// 存储路径：public_path('storage')
	CONST IMAGE_PATH    = 'blanket/';      // 公共文件
	CONST ARCHIVE_PATH  = 'archive/';      // 压缩文件

	protected $guarded = [];
	protected $appends = ['size_format'];

	public $table = "file_storages";
	protected $datas = ['deleted_at'];

	public function getSizeFormatAttribute()
    {
        return Helper::transFileSize($this->size);
    }

	/**
	 * 获取拥有此文件的模型
	 */
	public function app()
	{
		return $this->morphTo();
	}

	public function download()
	{
		$data = [
			'error'   => 0,
			'message' => 'success',
			'data'    => NULL
		];

		$url = $this->base_url . $this->path;
		if (URL::isValidUrl($url)) {
			$url  = parse_url($url);
			$url  = $url['scheme'] . '://' . $url['host'] . $url['path'];
			$file = pathinfo($url);
			$filename = md5(Hash::make($url)).'.jpg';

			if (!Storage::disk('public')->exists(self::IMAGE_PATH . $filename)) {
				try {
					// 下载图片
					$client = new \GuzzleHttp\Client(['verify' => true]);
					$res = $client->get($url, [], ['timeout' => 5]);
					if (strpos($res->getHeader('content-type')[0],'image') !== false) {
						Storage::disk('public')->put(
							self::IMAGE_PATH . $filename,
							$res->getBody()->getContents()
						);

						// 更新FileStorages
						$this->updateMain($filename);
						$data['message'] = '下载成功！URL: ' . $this->base_url . $this->path;

					}else{
						$this->updateMain($filename, FileStorages::STATUS_INVALID);
						$data['message'] = '图片 ' . $filename . ' 下载失败！请检查地址：' . $url;
					}

				} catch (\Exception $e) {
					$this->updateMain($filename, FileStorages::STATUS_INVALID);
					$data['error']   = 1;
					$data['message'] = '图片 ' . $filename . ' 下载失败！请检查地址：' . $url . ' 错误详情：' . $e->getMessage();
					Log::error($data['message']);
				}

			}else{
				// 更新FileStorages
				$this->updateMain($filename);
				$data['message'] = '图片 ' . $filename . ' 已存在，跳过下载';
			}

		}else{
			$data['message'] = 'URL: ' . $url . ' 无效，跳过下载';
		}

		$data['data'] = $this;
		return $data;
	}

	public static function saveMain($data)
	{
		if(!empty($data)){
			$fileStorage = new self();
			$imageArr = parse_url($data['link']);
			$fileStorage->path = $data['path'];
			$fileStorage->type = $data['type'];
			$fileStorage->size = $data['size'];
			$fileStorage->original_name = $data['original_name'];
			$fileStorage->name = $data['name'];
			$fileStorage->upload_ip = $data['upload_ip'];
			$fileStorage->hash = $data['hash'];
			$fileStorage->app_id = $data['app_id'];
			$fileStorage->base_url = $imageArr['scheme'].'://'.$imageArr['host'].'/';
			$fileStorage->link = $data['link'];
			$fileStorage->save();
			return $fileStorage;
		}
		return null;
	}
	/**
	 * [updateMain description]
	 * @param  [type] $filename [description]
	 * @param int $status
	 * @param string $path
	 * @return bool [type]           [description]
	 */
	public function updateMain($filename, $status=self::STATUS_PUBLIC, $path=self::IMAGE_PATH): bool
	{
		switch ($status) {
			case self::STATUS_PUBLIC:
				$this->base_url = URL::current() . '/';
				$this->path     = str_replace(URL::current() . '/', '', asset('storage/' . $path . $filename));
				$this->type     = Storage::disk('public')->mimeType($path .$filename);
				$this->size     = Storage::disk('public')->size($path .$filename);
				$this->name     = $filename;
				$this->status   = $status;
				break;
			case self::STATUS_INVALID:
				$this->status = $status;
		}
		return $this->save();
	}

	public function getImageUrl()
	{
		return $this->base_url . $this->path;
	}

    /**
     * @param string $filename
     *
     * @author: hongbinwang
     * @time  : 2021/8/14 10:24
     */
	public static function deleteOne(string $filename='')
	{
	    Log::error($filename);
	    if ($filename!='') {
            $file = self::where('name', $filename)->first();
            Log::error($file);
            if ($file) {
                if (Storage::disk('public')->exists($file->path)) {
                    Storage::disk('public')->delete($file->path);
                }
                $file->delete();
            }
        }
	}

	/**
	 * 生成压缩包
	 * @param $query
	 * @param string $type
	 * @return string
	 */
	public static function generateZip($query, $type = 'main_image')
	{
		if ($query->exists()) {
			// 创建目录
			Storage::disk('public')->makeDirectory(self::ARCHIVE_PATH);

			switch ($type) {
				case 'main_image':
					return self::zipMainFile($query);

				default:
					# code...
					break;
			}
		}
		return '';
	}

	public static function zipMainFile($query)
	{
		$zipname =  'Main_Files_' . date('YmdHis') . '-';
		$zipname .=  auth()->guard("api")->user()->id;
		$zipname .=  '.tar.gz';

		try{
			$query->chunkById(10, function($models){
				$models->each(function($item, $key){
					if (isset($item->mainImage->name) && !empty($item->mainImage->name)) {
						Storage::disk('public')->copy(
							self::IMAGE_PATH . $item->mainImage->name,
							'/main_files/' . $item->skus()->get()->first()->sku . '.' . File::extension($item->mainImage->name)
						);
					}
				});
			});
			$zip  = 'storage/' . self::ARCHIVE_PATH . $zipname;

			system("tar -zcf {$zip} -C storage/ main_files");

		}catch(\Exception $e){
			Storage::disk('public')->deleteDirectory('main_files');
			Log::error($e->getMessage());
			return '';
		}

		Storage::disk('public')->deleteDirectory('main_files');
		return asset('storage/' . self::ARCHIVE_PATH . $zipname);
	}

}
