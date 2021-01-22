<?php


namespace app\common\service;



use app\common\apiinit;

class ErrorService
{

  use apiinit;

    const SUCCESS_MSG_ARRAY = [
      'success' => '成功'
    ];
    const ERROR_MSG_ARRAY = [
      'error' => '失败'
    ];
  /**
   * 操作错误跳转的快捷方法
   *
   * @param string $msg
   */
  public static function error($msg = 'error')
  {
    return self::result([],-1,$msg);
  }

  /**
   * 操作成功跳转的快捷方法
   *
   * @param string $msg
   */
  public static function success($msg = 'success')
  {

    return self::result([],0,$msg);
  }

  public static function result($data = [],$code =0,$msg='')
  {

    return  ['code' => $code, 'msg' => $msg,'data'=>$data];
  }
}
