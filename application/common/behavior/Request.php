<?php
/**
 * Created by PhpStorm.
 * User: timeteam
 * Date: 18-12-17
 * Time: 下午1:20
 */

namespace app\common\behavior;


class Request
{

    public function run()
    { 
        /*$version = isset($_GET['version']) ? $_GET['version'] : 'v1';

        $m = isset($_GET['m']) ? $_GET['m'] : 'index';
        $controller = 'index';

        $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : $controller;

        $arr = explode('/', $s);
        // dump($arr);exit;
        $controller =  (isset($arr[2]) ? $arr[2] : $controller);

        $controller = $version .'\app\\' . $controller . '\api';
        if (!in_array($version, config('version.app_version'))) {
            echo '版本不存在';
            exit;
        }
        if (\think\facade\Request::server('SERVER_SOFTWARE') == 'swoole-http-server') {
            config('default_return_type', 'json');
            \think\facade\Env::set('ENTRANCE', 'swoole');
            config('url_controller_layer', 'swoole');
        } else {

            config('default_return_type', 'json');
            \think\facade\Env::set('ENTRANCE', 'api');
            config('url_controller_layer', $controller);
        }*/


    }
}