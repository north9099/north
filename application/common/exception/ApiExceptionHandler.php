<?php
/**
 * Created by PhpStorm.
 * User: xfs<xfs@datoit.com>
 * Date: 2020/11/7
 * Time: 9:09
 */

namespace app\common\exception;


use think\exception\Handle;
use app\common\utils\UtilShow;
use Exception;

class ApiExceptionHandler extends Handle
{
    public $httpStatusCode = 500;

    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \Exception   $e
     * @return mixed
     */
    public function render(Exception $e)
    {
        if($e instanceof ApiBaseException || $e instanceof \think\Exception){

            return UtilShow::fail(-1,$e->getMessage());
        }
        if($e instanceof \think\exception\HttpResponseException){
            return parent::render($e);
        }
        // 添加自定义异常处理机制
        if(method_exists($e,'getStatusCode')){
            $this->httpStatusCode = $e->getStatusCode();
        }
        return UtilShow::fail(-1,$e->getMessage(),[], $this->httpStatusCode);
        // 其他错误交给系统处理
        //return parent::render($e);
    }
}