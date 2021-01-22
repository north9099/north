<?php
 

namespace app\common\behavior;


/**
 * 注册钩子
 * @package app\common\behavior
 * @author 蔡伟明 <314013107@qq.com>
 */
class Hook
{
    /**
     * 执行行为 run方法是Behavior唯一的接口
     * @access public
     * @param mixed $params  行为参数
     * @return void
     */
    public function run()
    {
        if(defined('BIND_MODULE') && BIND_MODULE === 'install') return;




    }
}
