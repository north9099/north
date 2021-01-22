<?php

/**
 * Created by PhpStorm.
 * User: mybook-lhp
 * Date: 18/7/10
 * Time: 上午9:43
 */

namespace app\common\utils;

/**
 * 7.2以下可用
 * Class UtilAes
 * @package app\common\utils
 */
class UtilAes
{

    public $key = '';

    function __construct()
    {
    }
    /**
     * 加密
     */
    private function encrypt($input) {
        // $size = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        // $input = self::pkcs5_pad($input, $size);
        // $td = @mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        // $iv = @mcrypt_create_iv (@mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        // @mcrypt_generic_init($td, $this->key, $iv);
        // $data = @mcrypt_generic($td, $input);
        // @mcrypt_generic_deinit($td);
        // @mcrypt_module_close($td);
        // $data = base64_encode($data);
        // return $data;
        $size = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = self::addPKCS5Padding($input, $size);
        $td = @mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $iv = @mcrypt_create_iv(@mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        @mcrypt_generic_init($td, $this->key, $iv);
        $data = @mcrypt_generic($td, $input);
        @mcrypt_generic_deinit($td);
        @mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }
    private static function pkcs5_pad ($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
    
    /**
     * @desc    添加PKCS5填充
     * @param $source
     * @param $size
     * @return string
     */
    private static function addPKCS5Padding($source, $size)
    {
        $pad = $size - (strlen($source) % $size);
        return $source . str_repeat(chr($pad), $pad);
    }
    
    
    /**
     * 解密
     */
    private function decrypt($input)
    {
        $decrypted = @mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, base64_decode($input), MCRYPT_MODE_ECB);
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }



    /**
     * 解密
     */
    public static function decryptAesData($data = '', $key = '')
    {
        $self =   new self;
        $self->key = $key;
        return $self->decrypt($data);
    }
    /**
     * 加密
     */
    public static function encryptAesData($data = '', $key = '')
    {
        $self =   new self;
        $self->key = $key;
        return $self->encrypt($data);
    }
}