<?php
/**
 * Created by PhpStorm.
 * User: xfs<xfs@datoit.com>
 * Date: 2020/11/8
 * Time: 23:53
 */

namespace app\common\behavior;


class Cors
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if (request()->isOptions()) {
            exit();
        }
    }
}