<?php

/**
 * Created by PhpStorm.
 * User: mybook-lhp
 * Date: 18/7/2
 * Time: 下午3:39
 */

namespace app\common;

class RequestCode
{

    const RETURN_OK = 0; //成功
    const RETURN_FAIL = -1; //失败
    const RETURN_NOLOGIN = -2; //未登录
    const RETURN_AUTH = -3; //需要认证
    const RETURN_FROST = -4; //冻结
    const RETURN_UPDATE = -6; //更新




}
