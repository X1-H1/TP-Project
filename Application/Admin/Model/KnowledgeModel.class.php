<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27 0027
 * Time: 12:46
 */
//声明命名空间
namespace Admin\Model;
//引用父类的命名空间
use Think\Model;
//声明模型并继承父类的模型
class KnowledgeModel extends Model
{
    //处理数据方法
    public function addData($post,$file){
        /*判断是否有附件
         *要求是 size > 0
         * 或者是 error = 0
        */
        if($file['error'] == 0){
            //有文件处理
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            //实例化上传类
            $upfile = new \Think\Upload($cfg);
            //文件上传
            $info = $upfile -> uploadOne($file);
            //dump($info);die;
            //判断是否上传成功
            if($info){
                //成功
                //图片路径
                $post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                /*制作缩略图
                *大体上分为三个步骤
                 * 1、打开图片
                 * 2、制作缩略图
                 * 3、保存图片
                 * 等比例缩放 无法根据其返回值判断是否成功
                 * */
                //实例化缩略图类
                $image = new \Think\Image();
                //打开图片
                $image -> open(WORKING_PATH . $post['picture']);
                //制作缩略图
                $image -> thumb(100,100);
                //保存 是存的路径 (目录 + 文件名)
                $image -> save(WORKING_PATH . UPLOAD_ROOT_PATH . $info['savepath'] . "thumb_" . $info['savename']);
                //缩略图字段
                $post['thumb'] = UPLOAD_ROOT_PATH . $info['savepath'] . "thumb_" . $info['savename'];
            }
        }
        //追加时间字段
        $post['addtime'] = time();
        //dump($post);die;
        //返回添加后的信息
        return $this -> add($post);
    }
}