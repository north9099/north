<?php
    /**
     * Created by PhpStorm.
     * User: mybook-lhp
     * Date: 18/7/3
     * Time: 下午3:55
     */

    namespace app\common\behavior;


    use app\common\apiinit;

    use think\facade\Request;

    class Auth
    {

        use apiinit;
        public $AuthToken = null;

        public function run()
        {
            if (\think\facade\Request::server('SERVER_SOFTWARE') !== 'swoole-http-server')
            {
                $TOKEN = Request::header('x-auth-token');


            }

        }




    }