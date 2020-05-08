<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28 0028
 * Time: 8:56
 */
//声明命名空间
namespace Admin\Controller;
//引用父类的命名空间
use Think\Controller;
//声明类并继承父类
class EmailController extends CommonController
{
    //发送邮件
    public function send(){
        //判断是提交数据是否是post数据
        if(IS_POST){
            //处理数据
            //接收数据
            $post = I('post.');
            //实例化自定义模型，并调用方法出来了上传附件
            $model = D('Email');
            //调用模型方法
            $result = $model -> addData($post,$_FILES['file']);
            //判断是否成功
            if($result){
                //成功
                $this -> success('发送邮件成功！',U('sendBox'),3);
            }else{
                //失败
                $this -> error('发送邮件失败！');
            }
        }else{
            //找出收件人
            //实例化模型
            $model = M('User');
            //查出用户的id 和 truename
            $data = $model -> field('id,truename') -> where('id <>' . session('id')) ->select();
            //给模板传递参数
            $this -> assign("data",$data);
            //展示模板
            $this -> display();
        }
    }
    //发件箱
    public function sendBox(){
        /*
         * select t1.*,t2.truename as truename from sp_email as t1
         * left JOIN sp_user as t2 ON t1.to_id=t2.id WHERE t1.from_id = 1;
         * */
        //实例化模型，并查找数据
        $model = M('Email');
        //获得数据
        $data = $model -> field("t1.*,t2.truename as truename")
                        -> alias('t1')
                        -> join('left JOIN sp_user as t2 ON t1.to_id=t2.id')
                        -> where('t1.from_id = ' . session('id'))
                        -> select();
        //传递参数给模板
        $this -> assign('data',$data);
        //展示模板
        $this -> display();
    }
    //下载方法
    public function download(){
        //接收传过来的id值
        $id = I('get.id');
        //实例化模型 查找数据
        $data = M('Email') -> find($id);
        //下载代码
        $file = WORKING_PATH . $data['file'];
        //输出文件
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment;filename="' . basename($file) .'"');
        header("Content-Length:" . filesize($file));
        //输出缓冲区
        readfile($file);
    }
    //收件箱
    public function recBox(){
        //获取数据
        //SELECT t1.*,t2.truename as tn FROM sp_email as t1
        // LEFT JOIN sp_user as t2 ON t1.from_id = t2.id WHERE t1.to_id = 5
        $data = M('Email') ->field('t1.*,t2.truename as tn')
                            ->alias('t1')
                            ->join('LEFT JOIN sp_user as t2 ON t1.from_id = t2.id')
                            ->where('t1.to_id = ' . session('id'))
                            ->select();
        //传参数
        $this -> assign('data',$data);
        //展示模板
        $this -> display();
    }
    //获取邮件的具体内容
    public function getContent(){
        //获取id
        $id = I('get.id');
        //根据id去找数据
        $data = M('Email') -> where("id = $id and to_id = " . session('id')) -> find();
        if ($data['isread'] == 0 ){
            M('Email') -> save(array('id' => $id,'isread' => 1));
        }
        //输出
        echo $data['content'];
    }
    //获取当前用户未读的邮件数目
    public function getMsgCount(){
        //关联表并查询数据
        $count = M("Email") -> where("isread = 0 and to_id = " . session('id')) ->count();
        echo $count;
    }
    //空方法 此处空方法只对当前控制器起作用
    public function _empty(){
        $this -> display('Empty/error');
    }
}