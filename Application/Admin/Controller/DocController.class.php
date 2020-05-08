<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3 0003
 * Time: 11:06
 */
//声明命名空间
namespace Admin\Controller;
//引入父类的控制器
use Think\Controller;
//定义类名
class DocController extends CommonController
{
    //公文列表方法
    public function showlist(){
        //实例化模型
        $model = M('Doc');
        //进数据库查询数据
        $data = $model -> select();
        //传递参数
        $this -> assign("data",$data);
        //展示模板
        $this -> display();
    }
    //公文添加方法
    public function add(){
        //判断post数据
        if(IS_POST){
            //dump($_FILES['filename']);die();
            //接收数据
            $post = I('post.');
            //dump($post);die;

            //实例化模型 使用快速方法D方法 实现实例化自定义的模型
            $model = D('Doc');

            //调用模型方法处理数据
            $result = $model -> saveDate($post,$_FILES['file']);

            //判断是否成功写入数据库
            if($result){
                //成功
                $this -> success('公文添加成功！',U('showlist'));
            }else{
                //失败
                $this -> error('公文添加失败');
            }
        }else{
            //展示模板
            $this -> display();
        }
    }
    //附件的下载
    public function file_download(){
        if(IS_GET){
            //接收传过来的图片id
            $id = I('get.id');
            //实例化模型
            $model = M('Doc');
            //查询数据
            $result = $model -> find($id);
//            dump($result);die;
            //下载代码
            $file = WORKING_PATH . $result['filepath'];
            //输出文件
            header("Content-type: application/octet-stream");
            header('Content-Disposition: attachment;filename="' . basename($file) .'"');
            header("Content-Length:" . filesize($file));
            //输出缓冲区
            readfile($file);
        }
    }
    //显示内容
    public function showContent(){
        if(IS_GET){
            //接收传过来的id值
            $get = I('get.id');
            //实例化模型类对象
            $model = M('Doc') -> find($get);
            //输出内容
            echo htmlspecialchars_decode($model['content']);
        }
    }
    //编辑公文
    public function edit(){
        //判断是否是post传过来的数据
        if(IS_POST){
            //接收修改后提交的数据
            $post = I('post.');

            //打印输出提交的数据
            //dump($post);die();
            //实例化模型 并调用方法
            $model = D('Doc');
            $info = $model -> updateData($post,$_FILES['file']);
            //判断是否成功写入数据库
            if($info){
                //成功
                $this -> success('修改成功！',U('showlist'));
            }else{
                //失败
                $this -> error('修改失败！');
            }
        }else{
            //通过传过来的id 用I快速方法 获取对应的数据值
            $get = I('get.id');
            //实例化模型类的对象 并通过id查询数据
            $model = M('Doc') -> find($get);
            //传递数据
            $this -> assign('data',$model);
            //显示模板
            $this -> display();
        }

    }
}