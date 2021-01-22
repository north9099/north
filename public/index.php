<?php
/*
 * @Author: your name
 * @Date: 2020-10-23 15:55:27
 * @LastEditTime: 2020-11-08 12:01:51
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \api\public\index.php
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// // [ 应用入口文件 ]
namespace think;


// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 支持事先使用静态方法设置Request对象和Config对象
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: GET,POST,PATCH,PUT,DELETE,OPTIONS,DELETE');


$version = isset($_GET['version']) ? $_GET['version'] : 'v1';
define('APPVERSIONS', $version);

$path = str_replace('public', 'application/api/' . $version . '/config/app.php', __dir__);

if (!file_exists($path)) {

  echo json_encode([
    'code' => 0,
    'msg' => '版本错误',
    'data' => [],
    'version' => '',
    'time' => time()
  ]);
  exit;
}
// 支持事先使用静态方法设置Request对象和Config对象
// 执行应用并响应
Container::get('app')->run()->send();
