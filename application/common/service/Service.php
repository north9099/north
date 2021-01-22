<?php


namespace app\common\service;


use think\facade\Cache;

class Service extends ErrorService
{

    //到期时间
    const Maturity = 1800;

    const Email = 2;
    const Phone = 1;


    /**
     * 验证验证码
     * @param $contractModel //手机号或者邮箱
     * @param $behavior //行为
     * @param $code //验证码
     * @return array
     */
    public static function checkVerificationCode($contractModel, $behavior, $code)
    {
        $config = config('');
        $key = $config['rediskey']['userVerify'];
        $str = $config['configuration']['captchaType'][$behavior];
        if (Cache::has($key . $str . $contractModel) && intval($code) == intval(Cache::get($key . $str . $contractModel))) {
            Cache::rm($key . $str . $contractModel);
            return true;
        }
        return false;
    }


   
    public static function getVerificationCode($type, $contactModel, $behavior)
    {
        $config = config('');
        $key = $config['rediskey']['userVerify'];
        $str = $config['configuration']['captchaType'][$behavior];

        if (!$str) {
            return false;
        }


        if (Cache::has($key . $str . $contactModel)) {
            return false;
        }
        //发送验证码
        $captcha = generate_rand_str(6, 3);

        switch ($type) {
            case self::Phone:
                $service = new SmsService(['key' => 'F5ZX3XBN9iuj4nBmdd3ZlCPUyhJ43vjJ', 'merchNo' => '0000000000017370']);

                $result = $service->send($contactModel, $captcha);
                break;
            case self::Email:
                $service = new EmailService(['account' => '', 'password' => '']);
                $result = $service->send($contactModel, $captcha);
                break;
            default:
                $result = false;
                break;
        }
        if ($result) {
            Cache::set($key . ':' . $str . $contactModel, $captcha, self::Maturity);
            return true;
        } else {
            return false;
        }
    }
}
