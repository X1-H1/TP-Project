<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28 0028
 * Time: 10:26
 */
//声明命名空间
namespace Admin\Model;
//引入父类的命名空间
use Think\Model;
//声明类并继承父类
class EmailModel extends Model
{
    //addData 方法
    public function addData($post,$file){
        //判断是否有附件
        if($file['error'] == '0'){
            //配置上传文件类的参数
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            //实例化上传类
            $upfile = new \Think\Upload($cfg);
            //调用上传方法
            $info = $upfile -> uploadOne($file);
            //dump($info);die;
            //判断是否上传成功
            if($info){
                //成功
                //保存文件在盘符中相对于站点的路径
                $post['file'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                //表示是否有文件
                $post['hasfile'] = 1;
                //文件的原始名
                $post['filename'] = $info['name'];
            }
        }
        //追加时间字段
        $post['addtime'] = time();
        //追加from_id字段
        $post['from_id'] = session('id');
        //dump($post);die;
        //数据的保存，并返回
        return $this -> add($post);
    }
}