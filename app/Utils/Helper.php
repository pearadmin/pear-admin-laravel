<?php

namespace App\Utils;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class Helper {

    CONST DAY_IN_SECOND = 86400;
    CONST HOUR_IN_SECOND = 3600;

    /**
     * 计算不同时区时差
     * @param  [type] $local_tz  本地时区
     * @param  [type] $target_tz 目标时区
     * @return [type]            [description]
     */
    public static function timeZoneLag($local_tz, $target_tz)
    {
        $local = Carbon::now($local_tz)->toDateTimeString();
        $target = Carbon::now($target_tz);
        return $target->diffInHours($local, false);
    }

    /**
     * 时间转换为时间戳
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
    public static function timeTrans($time)
    {
        if (is_numeric($time) && strlen($time) === 13) {
            return $time / 1000;
        }

        if (is_string($time)) {
            return strtotime($time);
        }

        return $time;
    }

    /**
     * 计算时间段内有多少天
     * @param  [type] $start_date 时间戳
     * @param  [type] $due_date   时间戳
     * @return [type]             [description]
     */
    public static function getDateCount($start_date, $due_date)
    {
        return (self::timeTrans($due_date) - self::timeTrans($start_date)) / self::DAY_IN_SECOND;
    }

    /**
     * 计算周期内全部日期
     * @param  [type] $start_date [description]
     * @param  [type] $due_date   [description]
     * @return [type]             [description]
     */
    public static function getDateFromRange($start_date, $due_date)
    {
        $days = self::getDateCount($start_date, $due_date);
        $date = [];

        $tz = Carbon::now()->tzName;
        $lag = self::timeZoneLag($tz, 'UTC');
        date_default_timezone_set('UTC');
        for ($i=0; $i < $days; $i++) {
            $date[] = date('Y-m-d', $start_date + (self::HOUR_IN_SECOND * $lag) + (self::DAY_IN_SECOND * $i));
        }
        date_default_timezone_set($tz);
        return $date;
    }

    /**
     * 时间戳获取当前周期和上一周期内的全部日期
     * @param  [type]  $start_date  [description]
     * @param  [type]  $due_date    [description]
     * @param  boolean $is_micro    [description]
     * @return [type]               [description]
     */
    public static function getDateCycle($start_date = null, $due_date = null)
    {
        $cycle = [
            'date'   => [],
            '_date'  => [],
            'range'  => ['from' => 0, 'to' => 0],
            '_range' => ['from' => 0, 'to' => 0]
        ];

        $start_date = self::timeTrans($start_date);
        $due_date = self::timeTrans($due_date);

        if ($start_date && $due_date) {
            $_start_date     = 2 * $start_date - $due_date;
            $cycle['date']   = self::getDateFromRange($start_date, $due_date);
            $cycle['_date']  = self::getDateFromRange($_start_date, $start_date);
            $cycle['range']  = ['from' => (int)$start_date, 'to' => $due_date - 1];
            $cycle['_range'] = ['from' => (int)$_start_date, 'to' => $start_date - 1];
        }

        return $cycle;
    }

    public static function getDateCycleV2($start_date = null, $due_date = null)
    {
        $cycle = [
            'range'  => ['from' => 0, 'to' => 0],
            '_range' => ['from' => 0, 'to' => 0]
        ];

        $start_date = self::timeTrans($start_date);
        $due_date = self::timeTrans($due_date);

        if ($start_date && $due_date) {
            $_start_date     = 2 * $start_date - $due_date;
            $cycle['range']  = ['from' => (int)$start_date, 'to' => $due_date];
            $cycle['_range'] = ['from' => (int)$_start_date, 'to' => $start_date];
        }

        return $cycle;
    }

    /**
     * Serial Number 生成器
     * @param  string $prefix [description]
     * @return [type]         [description]
     */
    public static function serialNoBuilder($prefix = '')
    {
        $year = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N'];
        $sn  = $year[intval(date('Y')) - 2020];
        $sn .= strtoupper(dechex(date('m')));
        $sn .= date('d') . substr(time(), -5);
        $sn .= substr(microtime(), 2, 5);
        $sn .= sprintf('%02d', rand(0, 99));
        return $prefix . $sn;
    }

    /**
     * 文件大小转换
     * @param  [type] $filesize 单位：Bytes
     * @return [type]           [description]
     */
    public static function transFileSize($filesize) {
        if ($filesize >= 1073741824) {
            $filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
        } elseif ($filesize >= 1048576) {
            $filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
        } elseif ($filesize >= 1024) {
            $filesize = round($filesize / 1024 * 100) / 100 . ' KB';
        } else {
            $filesize = $filesize . ' Bytes';
        }
        return $filesize;
    }

    /**
     * 根据参数，生成缓存键名
     * @param  [type] $collect [description]
     * @param  string $group   [description]
     * @return [type]          [description]
     */
    public static function createCacheKey($collect, $group = '')
    {
        if ($group) { $group .= ':'; }

        if (!($collect instanceof Collection)) {
            $collect = collect($collect);
        }
        foreach ($collect as $key => $value) {
            if (!$value) {
                unset($collect[$key]);
            }
        }
        return $group . md5(serialize($collect->sortKeys()->all()));
    }

	/**
	 * 检查链接是否可用
	 * @param $url
	 * @return mixed
	 */
	public static function httpCodeCheck($url){
		$ch = curl_init();
		$timeout =5;
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_exec($ch);
		return curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
	}

	/**
	 * 下载远程文件
	 * @param string $src
	 * @param string $path
	 * @return string
	 */
	public static function downloadImageToTempDirectory(string $src,string $path)
	{
		if (self::httpCodeCheck($src)==200){
			$filename = md5($src).'.jpg';
			if (!Storage::disk('public')->exists($path . $filename)) {
				//1秒后开始下载图片
				sleep(1);
				$client = new Client(['verify' => true]);
				$resource = $client->get($src, [], ['timeout' => 5]);
				Storage::disk('public')->put($path . $filename, $resource->getBody()->getContents());
			}
			return public_path('storage/'.$path . $filename);
		} else {
			//文件不存在 返回默认文件
			return base_path('resources/admin/public/null.png');
		}
	}

	/**
	 * 删除文件目录
	 * @param string $path
	 */
	public static function deleteTempDirectory(string $path)
	{
		$storage = Storage::disk('public');
		if ($storage->exists($path)){
			$storage->deleteDirectory($path);
		}
	}

	/**
	 * 获取字符串中的数字
	 * @param string $str
	 * @return float|int|string
	 */
	public static function findNum(string $str=''){
		$str = trim($str);
		if(empty($str)) return '';
		$result = '';
		for($i = 0; $i < strlen($str); $i++){
			if(is_numeric($str[$i])){
				$result .= $str[$i];
			}
		}
		if ($result!='') $result = $result*1;

    	return $result;
	}

	/**
	 * 删除所有的空格
	 * @param $str
	 * @return array|string|string[]
	 */
	public static function trimAll($string)
	{
		if (!$string == false){
			//去除中文半角,全角空格
			$string = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$string);
			//去除其他空格，换行
			$string = str_replace([" ","　","\t","\n","\r"],["","","","",""],$string);
		}
		return $string;
	}

	/**
	 * 二维数组去空
	 * @param       $arr
	 * @return mixed
	 *
	 * @author: hongbinwang
	 * @time  : 2021/6/15 16:40
	 */
	public static function filter_array($arr) {
		foreach ($arr as $key => $val) {
			$val = array_filter($val);
			if (empty($val)) unset($arr[$key]);
		}
		return $arr;
	}

    /**
     * 二维数组去重
     * @param array $arr
     * @return array
     *
     * @author: hongbinwang
     * @time  : 2021/8/3 14:30
     */
    public static function unique_array($arr = array())
    {
        $temp = [];$arr_after = [];$arr_inner_key = [];
        foreach ($arr[0] as $k => $v) {
            $arr_inner_key[] = $k;
        }
        foreach ($arr as $k => $v) {
            $v = join(",", $v);
            $temp[$k] = $v;
        }
        $temp = array_unique($temp);
        foreach ($temp as $k => $v) {
            $a = explode(",", $v);
            $arr_after[$k] = array_combine($arr_inner_key, $a);
        }
        return array_values($arr_after);
    }

    /**
     * 二维数组按照指定字段进行排序
     * @params array $array 需要排序的数组
     * @params string $field 排序的字段
     * @params string $sort 排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
     */
    public static function sequence_array($array, $field, $sort = 'SORT_DESC')
    {
        $arrSort = array();
        foreach ($array as $unique => $row) {
            foreach ($row as $key => $value) {
                $arrSort[$key][$unique] = $value;
            }
        }
        array_multisort($arrSort[$field], constant($sort), $array);
        return $array;
    }

    /**
     * 字符串两次md5加密
     * @param string $str 要加密的字符串
     * @return string
     */
    public static function double_md5(string $str) {
        return md5(md5(trim($str)));
    }

    /**
     * 时间戳转换
     * @param $time
     * @return string
     */
    public static function timeToBefore(int $time) {
        $t = time() - $time;
        $f = array('31536000' => '年', '2592000' => '个月', '604800' => '星期', '86400' => '天', '3600' => '小时', '60' => '分钟', '1' => '秒');
        foreach ($f as $k => $v) {
            if (0 != $c = floor($t/(int)$k)) {
                return $c . $v . '前';
            }else{
                return '刚刚';
            }
        }
    }

    /**
     * 计算两日期相差天数
     * @param string $endTime 结束时间
     * @param string $startTime 开始时间
     * @param int $flag 传入日期格式(0-时间戳,1-日期格式)
     * @return false|float
     */
    public static function calDifferentDay($endTime='', $startTime='', $flag=1) {
        //转换为天，取出时分秒
        $startTime = ($startTime == '') ? date('Y-m-d H:i:s', time()) : $startTime;
        $endTime = ($endTime == '') ? date('Y-m-d H:i:s', time()) : $endTime;
        if ($flag) {
            $startTime = strtotime($startTime);
            $endTime = strtotime($endTime);
        }
        $startTime = floor($startTime / 86400);
        $endTime = floor($endTime / 86400);
        return $endTime - $startTime;
    }

    /**
     * 隐藏手机号
     * @param string|int $str 手机号码
     * @param int $start 开始位置，从0开始
     * @param int $length 隐藏长度
     * @return bool|string|string[]
     */
    public static function hidePhone($str, int $start = 3, int $length = 4) {
        //获取最后一位
        $end = $start + $length;
        //判断传参是否正确
        if ($start < 0 || $end > 11) return false;
        $replace = ''; //用于判断多少
        for ($i = 0; $i < $length; $i++) $replace .= '*';
        return substr_replace($str, $replace, $start, $length);
    }
}
