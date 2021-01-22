<?php

/**
 * Created by PhpStorm.
 * User: mybook-lhp
 * Date: 18/4/12
 * Time: 下午4:04
 */

namespace app\common;

use think\exception\HttpResponseException;
use think\Response;

trait apiinit
{

    public static $AuthTokenStatus = 0;

    /**
     * 失败：-1
     * 未登录：-2
     * 需要认证：-3
     * 冻结：-4
     * 更新：-6
     *
     */
    //数据集合！
    protected $_initialize = [];

    protected function noAuth($msg = 'error', $data = '', $url = null, $wait = 3, array $header = [])
    {

        $this->result($data, RequestCode::RETURN_NOLOGIN, $msg, 'json');
    }

    /**
     * 操作错误跳转的快捷方法
     *
     * @param string $msg
     */
    protected function error($msg = 'error', $data = '', $url = null, $wait = 3, array $header = [])
    {

        $this->result($data, RequestCode::RETURN_FAIL, $msg, 'json');
    }

    /**
     * 操作成功跳转的快捷方法
     *
     * @param string $msg
     */
    protected function success($msg = 'success', $data = '', $url = null, $wait = 3, array $header = [])
    {

        $this->result($data, RequestCode::RETURN_OK, $msg, 'json');
    }

    /**
     * 返回封装后的 API 数据到客户端
     *
     * @access protected
     *
     * @param mixed $data 要返回的数据
     * @param int $code 返回的 code
     * @param mixed $msg 提示信息
     * @param string $type 返回数据格式
     * @param array $header 发送的 Header 信息
     *
     * @return void
     * @throws HttpResponseException
     */
    protected function result($data = [], $code = RequestCode::RETURN_OK, $msg = 'success', $type = 'json', array $header = [])
    {

        if (config('app.app_result_debug')) {
            $result = [
                'code' => $code,
                'msg' => $msg,
                //'msg' => lang($msg),
                'time' => time(),
                'data' => $data,
                'version' => ''
            ];
        } else {
            $result = [
                'code' => $code,
                'msg' => $msg,
                //'msg' => lang($msg),
                'time' => time(),
                'data' => $data,
                'version' => ''
            ];
            
        }
        throw new HttpResponseException(Response::create($result, $type)->header(['auth-token-status' => static::$AuthTokenStatus]));
    }
}
