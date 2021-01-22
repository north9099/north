<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

use app\api\v1\app\member\model\MemberModel;

// 应用公共文件
function post($url, $data, $header = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if (!empty($header)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

function getRandomString($len, $chars = null)
{
    if (is_null($chars)) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000 * (double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $lc)];
    }

    $is_user = MemberModel::where('invitation_code', $str)->count('id');
    if ($is_user > 0) {
        getRandomString($len);
    }

    return $str;
}


if (!function_exists('generate_rand_str')) {
    /**
     * 生成随机字符串
     *
     * @param int $length 生成长度
     * @param int $type 生成类型：0-小写字母+数字，1-小写字母，2-大写字母，3-数字，4-小写+大写字母，5-小写+大写+数字
     *
     * @return string
     * @author 蔡伟明 <314013107@qq.com>
     */
    function generate_rand_str($length = 8, $type = 0)
    {
        $a = 'abcdefghijklmnopqrstuvwxyz';
        $A = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $n = '0123456789';
        switch ($type) {
            case 1:
                $chars = $a;
                break;
            case 2:
                $chars = $A;
                break;
            case 3:
                $chars = $n;
                break;
            case 4:
                $chars = $a . $A;
                break;
            case 5:
                $chars = $a . $A . $n;
                break;
            case 6:
                $chars = $A . $n;
                break;
            default:
                $chars = $a . $n;
        }
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $str;
    }
}

if (!function_exists('encryptedString')) {
    /**
     *
     * @param $request_data
     * @param $type
     *
     * @return string
     */
    function encryptedString($password)
    {
        return md5(config('configuration.salt.memberPasswordSalt') . $password);
    }
}
if (!function_exists('PassStart')){
    function PassStart($str,$start,$end=0,$dot="*",$charset="UTF-8"){
        $len = mb_strlen($str,$charset);
        if($start==0||$start>$len){
            $start = 1;
        }
        if($end!=0&&$end>$len){
            $end = $len-2;
        }
        $endStart = $len-$end;
        $top = mb_substr($str, 0,$start,$charset);
        $bottom = "";
        if($endStart>0){
            $bottom =  mb_substr($str, $endStart,$end,$charset);
        }
        $len = $len-mb_strlen($top,$charset);
        $len = $len-mb_strlen($bottom,$charset);
        $newStr = $top;
        for($i=0;$i<$len;$i++){
            $newStr.=$dot;
        }
        $newStr.=$bottom;
        return $newStr;
    }

}

if (!function_exists('get')) {
    function get($url, $header = [], $https = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $https);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}

if (!function_exists('aroundNumber')) {
    //小数点后4位截断
    function aroundNumber($number, $len = 8, $int = 9)
    {
        $arr = explode('.', sprintf('%.' . ($len + 1) . 'f', $number));
        if (count($arr) > 1) {
            return ($arr[0] > 0 ? $arr[0] : 0) . '.' . substr($arr[1], 0, $len);
        } else {
            return $arr[0];
        }
    }
}

if (!function_exists('strtrReplace')) {
    /**
     * 替换
     * @param string $str
     * @param $arr
     * @return int|string
     */
    function strtrReplace($str = '', $search, $searchs)
    {
        if ($str) {
            return str_replace($search, $searchs, $str);
        }

        return rand(1, 10000000);
    }
}