<?php
/*
 * @Author: your name
 * @Date: 2020-11-03 15:03:21
 * @LastEditTime: 2020-11-03 15:15:08
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \radarRefactorAPI\application\api\v1\config\session.php
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 会话设置
// +----------------------------------------------------------------------

return [
  'id'             => '',
  // SESSION_ID的提交变量,解决flash上传跨域
  'var_session_id' => '',
  // SESSION 前缀
  'prefix'         => 'think',
  // 驱动方式 支持redis memcache memcached
  'type'           => '',
  // 是否自动开启 SESSION
  'auto_start'     => true,
];
