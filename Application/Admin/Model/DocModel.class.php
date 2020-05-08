<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/7 0007
 * Time: 12:44
 */
//声明命名空间
namespace Admin\Model;
//引入父类的模型
use Think\Model;

//声明模型
class DocModel extends Model
{
    public function saveDate($post,$files){
        //处理提交
        //判断是否有上传文件
        if(!$files['error']){
            //上传类的路径
            $cfg = array(
                'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH,#保存根路径
            );
            //实例化文件上传类
            $upfile = new \Think\Upload($cfg);
            //开始上传
            $info = $upfile -> uploadOne($files);
            //判断是否成功
            if($info){
                //上传成功 补全其余的三个字段
                $post['filepath'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                $post['filename'] = $info['name'];//存储文件的原始名
                $post['hasfile'] = 1;
            }
        }
        /*
         * else{
         *  使用A方法实例化控制器
         *  A('Doc') -> error($upfile -> getError());
         * }
         * */
        //追加addtime字段
        $post['addtime'] = time();
        //dump($post);die;

        //存储数据
        return $this -> add($post);
    }
    //修改数据并提交数据库
    public function updateData($post,$file){
        //如果上传文件更新了则处理上传文件
        if($file['error'] == '0'){
            //处理文件
            //为上传类写配置项
            $cfg = array(
                'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH #此处为保存的根路径
            );
            //实例化上传类
            $upfile = new \Think\Upload($cfg);
            //开始上传
            $info = $upfile -> uploadOne($file);
            //dump($info);die();
            //判断是否上传成功
            if($info){
                //成功补全字段
                $post['filepath'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                $post['filename'] = $info['name'];
                $post['hasfile'] = 1;
            }
            //dump($post);die;
        }
        //提交数据
        return $this -> save($post);
    }
}