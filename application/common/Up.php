<?php

/**
 * Created by PhpStorm.
 * User: mybook-lhp
 * Date: 18/7/4
 * Time: 下午3:27
 */

namespace app\common;


use think\Controller;
use think\facade\Request;
use think\Image;


/**
 *  上传
 */
class Up extends Controller
{


  /**
   * 上传附件
   *
   * @url /member/account/upload
   * @method POST
   * @param string file          文件
   *
   *
   * @return int $code 状态码
   * @return int $msg 返回消息
   * @return int $data 返回数据
   */
  public function upload()
  {

    // 临时取消执行时间限制
    set_time_limit(0);

    return $this->saveFiles('images', '', 'api');
  }

  protected function saveFiles($dir = '', $module = '')
  {
    $file_input_name = 'file';
    $file = $this->request->file($file_input_name);
    //        $nickname = UserProfileModel::where('username', $this->username)->value('nickname');
    $nickname = time() . rand(1, 1000);
    if ($file != null && $file != "") {
      //            $bef_info = $file->getInfo();
      //            if ($bef_info['size'] < 1000000) {
      $final_name = $file->getInfo()['name'];
      $final_symbol = substr(strrchr($final_name, '.'), 1);
      $dir = '/upload/certification/' . $nickname . '/';
      if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $dir)) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . $dir, 0777, true);
      }
      //文件名
      $name = time() . '.' . $final_symbol;
      $info = $file->validate(['size' => 1000000, 'ext' => 'jpg,png'])->move($_SERVER['DOCUMENT_ROOT'] . $dir, $name);
      if ($info) {
        //                    $this->result(['url'=>$dir . $name,'domain'=>Request::domain()]);
        echo json_encode(['data' => Request::domain() . $dir . $name, 'code' => 200]);
        exit;
      } else {
        echo json_encode(['msg' => '上传失败', 'code' => 500]);
        exit;
      }
      //            } else {
      //                $this->error('图片过大', $file);
      //            }
    } else {
      $this->error('未接收到图片', $file);
    }
  }


  /**保存附件
   * @param string $dir
   * @param string $module
   * @throws \think\exception\DbException
   */
  private function saveFile($dir = '', $module = '')
  {
    // 附件大小限制
    $size_limit = $dir == 'images' ? config('upload_image_size') : config('upload_file_size');
    $size_limit = $size_limit * 1024;
    // 附件类型限制
    $ext_limit = $dir == 'images' ? config('upload_image_ext') : config('upload_file_ext');
    $ext_limit = $ext_limit != '' ? parse_attr($ext_limit) : '';
    // 缩略图参数
    $thumb = $this->request->post('thumb', '');
    // 水印参数
    $watermark = $this->request->post('watermark', '');

    // 获取附件数据
    $callback = '';
    $file_input_name = 'file';
    $file = $this->request->file($file_input_name);

    // 判断附件是否已存在
    //        if ($file_exists = Attachment::get(['md5' => $file->hash('md5')])) {
    //            if ($file_exists['driver'] == 'local') {
    //                $file_path = \think\facade\App::getRootPath() . '/public/' . $file_exists['path'];
    //            } else {
    //                $file_path = $file_exists['path'];
    //            }
    //
    //            $this->result([
    //                'code' => 1,
    //                'info' => '上传成功',
    //                'class' => 'success',
    //                'id' => $file_exists['id'],
    //                'path' => $file_path
    //            ]);
    //
    //        }

    // 判断附件大小是否超过限制
    if ($size_limit > 0 && ($file->getInfo('size') > $size_limit)) {

      $this->result([
        'code' => 0,
        'class' => 'danger',
        'info' => '附件过大'
      ]);
    }

    // 判断附件格式是否符合
    $file_name = $file->getInfo('name');
    $file_ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
    $error_msg = '';
    if ($ext_limit == '') {
      $error_msg = '获取文件信息失败！';
    }
    if ($file->getMime() == 'text/x-php' || $file->getMime() == 'text/html') {
      $error_msg = '禁止上传非法文件！';
    }
    if (preg_grep("/php/i", $ext_limit)) {
      $error_msg = '禁止上传非法文件！';
    }
    if (!preg_grep("/$file_ext/i", $ext_limit)) {
      $error_msg = '附件类型不正确！';
    }

    if ($error_msg != '') {
      $this->result([
        'code' => 0,
        'class' => 'danger',
        'info' => $error_msg
      ]);
    }

    // 附件上传钩子，用于第三方文件上传扩展
    if (config('upload_driver') != 'local') {
      //            $hook_result = Hook::listen('upload_attachment', ['file' => $file, 'from' => 'api', 'module' => $module, 'uid' => $this->member_id], true);
      //
      //            if (false !== $hook_result) {
      //                return $hook_result;
      //            }
    }

    // 移动到框架应用根目录/upload/ 目录下
    $info = $file->move(config('upload_path') . DIRECTORY_SEPARATOR . $dir);
    if ($info) {
      // 缩略图路径
      $thumb_path_name = '';
      // 图片宽度
      $img_width = '';
      // 图片高度
      $img_height = '';
      if ($dir == 'images') {
        $img = Image::open($info);
        $img_width = $img->width();
        $img_height = $img->height();
        // 水印功能
        if ($watermark == '') {
          if (config('upload_thumb_water') == 1 && config('upload_thumb_water_pic') > 0) {
            $this->create_water($info->getRealPath(), config('upload_thumb_water_pic'));
          }
        } else {
          if (strtolower($watermark) != 'close') {
            list($watermark_img, $watermark_pos, $watermark_alpha) = explode('|', $watermark);
            $this->create_water($info->getRealPath(), $watermark_img, $watermark_pos, $watermark_alpha);
          }
        }

        // 生成缩略图
        if ($thumb == '') {
          if (config('upload_image_thumb') != '') {
            $thumb_path_name = $this->create_thumb($info, $info->getPathInfo()->getfileName(), $info->getFilename());
          }
        } else {
          if (strtolower($thumb) != 'close') {
            list($thumb_size, $thumb_type) = explode('|', $thumb);
            $thumb_path_name = $this->create_thumb($info, $info->getPathInfo()->getfileName(), $info->getFilename(), $thumb_size, $thumb_type);
          }
        }
      }

      // 获取附件信息
      $file_info = [
        'uid' => $this->member_id,
        'name' => $file->getInfo('name'),
        'mime' => $file->getInfo('type'),
        'path' => 'upload/' . $dir . '/' . str_replace('\\', '/', $info->getSaveName()),
        'ext' => $info->getExtension(),
        'size' => $info->getSize(),
        'md5' => $info->hash('md5'),
        'sha1' => $info->hash('sha1'),
        'thumb' => $thumb_path_name,
        'module' => $module,
        'width' => $img_width,
        'height' => $img_height,
      ];

      // 写入数据库

      $file_path = \think\facade\App::getRootPath() . 'public/' . $file_info['path'];
      $this->result([
        'code' => 1,
        'info' => '上传成功',
        'class' => 'success',
        'id' => 1,
        'path' => $file_path
      ]);
    } else {
      $this->result(['code' => 0, 'class' => 'danger', 'info' => $file->getError()]);
    }
  }


  /**
   * 创建缩略图
   * @param string $file 目标文件，可以是文件对象或文件路径
   * @param string $dir 保存目录，即目标文件所在的目录名
   * @param string $save_name 缩略图名
   * @param string $thumb_size 尺寸
   * @param string $thumb_type 裁剪类型
   * @return string 缩略图路径
   * @author 蔡伟明 <314013107@qq.com>
   */
  private function create_thumb($file = '', $dir = '', $save_name = '', $thumb_size = '', $thumb_type = '')
  {
    // 获取要生成的缩略图最大宽度和高度
    $thumb_size = $thumb_size == '' ? config('upload_image_thumb') : $thumb_size;
    list($thumb_max_width, $thumb_max_height) = explode(',', $thumb_size);
    // 读取图片
    $image = Image::open($file);
    // 生成缩略图
    $thumb_type = $thumb_type == '' ? config('upload_image_thumb_type') : $thumb_type;
    $image->thumb($thumb_max_width, $thumb_max_height, $thumb_type);
    // 保存缩略图
    $thumb_path = config('upload_path') . DIRECTORY_SEPARATOR . 'images/' . $dir . '/thumb/';
    if (!is_dir($thumb_path)) {
      mkdir($thumb_path, 0766, true);
    }
    $thumb_path_name = $thumb_path . $save_name;
    $image->save($thumb_path_name);
    $thumb_path_name = 'upload/images/' . $dir . '/thumb/' . $save_name;
    return $thumb_path_name;
  }

  /**
   * 添加水印
   * @param string $file 要添加水印的文件路径
   * @param string $watermark_img 水印图片id
   * @param string $watermark_pos 水印位置
   * @param string $watermark_alpha 水印透明度
   * @author 蔡伟明 <314013107@qq.com>
   */
  private function create_water($file = '', $watermark_img = '', $watermark_pos = '', $watermark_alpha = '')
  {
    $path = model('admin/attachment')->getFilePath($watermark_img, 1);
    $thumb_water_pic = realpath(\think\facade\Env::get("ROOT_PATH") . 'public/' . $path);
    if (is_file($thumb_water_pic)) {
      // 读取图片
      $image = Image::open($file);
      // 添加水印
      $watermark_pos = $watermark_pos == '' ? config('upload_thumb_water_position') : $watermark_pos;
      $watermark_alpha = $watermark_alpha == '' ? config('upload_thumb_water_alpha') : $watermark_alpha;
      $image->water($thumb_water_pic, $watermark_pos, $watermark_alpha);
      // 保存水印图片，覆盖原图
      $image->save($file);
    }
  }
}
