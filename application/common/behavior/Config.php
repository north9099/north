<?php
 

    namespace app\common\behavior;




    use app\common\apiinit;

    /**
     * 初始化配置信息行为
     * 将系统配置信息合并到本地配置
     * @package app\common\behavior
     * @author CaiWeiMing <314013107@qq.com>
     */
    class Config
    {
        use apiinit;

        /**
         * 执行行为 run方法是Behavior唯一的接口
         * @access public
         * @param mixed $params 行为参数
         * @return void
         */
        public function run()
        {
            // 如果是安装操作，直接返回
            if (defined('BIND_MODULE') && BIND_MODULE === 'install')
                return;


        }
    }
