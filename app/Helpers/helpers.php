<?php
    if (!function_exists('_i')) {
        /**
         * 通用数字格式化函数
         * @param $val
         * @return float|int
         */
        function _i($val) {
            return (double)$val * 1;
        }
    }

    if (!function_exists('_s')) {
        /**
         * 通用字符串格式化函数
         * @param string $str
         * @return string
         */
        function _s(string $str): string {
            return strval(trim($str));
        }
    }

    if (!function_exists('_f')) {
        /**
         * 通用字符串格式化函数
         * @param $len
         * @param $val
         * @return string
         */
        function _f(int $len, $val): string {
            return sprintf("%.{$len}f", $val);
        }
    }

    if (!function_exists('GetIP')) {
        /**
         * 获取访问用户ip
         */
        function GetIP() {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
    }

    if (!function_exists('ModifyEnv')) {
        /**
         * 更新.env配置文件
         * @param array $data
         */
        function ModifyEnv(array $data) {
            $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
            $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
            $contentArray->transform(function ($item) use ($data) {
                foreach ($data as $key => $value) {
                    if (str_contains($item, $key)) {
                        return $key . '=' . $value;
                    }
                }
                return $item;
            });

            $content = implode($contentArray->toArray(), "\n");
            \File::put($envPath, $content);
        }
    }

    /**
     * 字符串两次md5加密
     * @param string $str 要加密的字符串
     * @return string
     */
    function double_md5(string $str) {

        return md5(md5(trim($str)));
    }

    /**
     * 返回可读性更好的文件尺寸
     * @param string $bytes  原字符串
     * @param int    $decimals  保留长度
     * @return string
     */
    function human_filesize(string $bytes, $decimals = 2){
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).@$size[$factor];
    }

    /**
     * 时间戳转换
     * @param $time
     * @return string
     */
    function timeToBefore(int $time) {
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
    function calDifferentDay($endTime='', $startTime='', $flag=1) {
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
    function hidePhone($str, int $start = 3, int $length = 4) {
        //获取最后一位
        $end = $start + $length;
        //判断传参是否正确
        if ($start < 0 || $end > 11) return false;
        $replace = ''; //用于判断多少
        for ($i = 0; $i < $length; $i++) $replace .= '*';
        return substr_replace($str, $replace, $start, $length);
    }

    /**
     * @param string $url 请求的url
     * @param string $type 请求类型
     * @param string $res 返回数据类型
     * @param string $arr post请求参数
     * @return mixed
     */
    function http_curl(string $url, $type='get', $res='json', $arr='')
    {
        //1. 初始化 curl
        $ch = curl_init();
        //2. 设置 curl 的参数
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        if ($type == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        }
        //3. 采集
        $output = curl_exec($ch);
        //4. 关闭
        curl_close($ch);
        if ($res == 'json') {
            return json_decode($output, true);
        } elseif (curl_errno($ch)) {
            return (curl_errno($ch));
        } else {
            return null;
        }
    }
