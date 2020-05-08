<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27 0027
 * Time: 8:50
 */
//声明命名空间
namespace Admin\Controller;
//引入父类的命名空间
use Think\Controller;
//声明类并继承父类
class KnowledgeController extends CommonController
{
    //知识添加
    public function add(){
        //判断是否是post数据
        if(IS_POST){
            //处理post数据
            //接收数据
            $post = I('post.');
            //实例化自定义模型
            $model = D('Knowledge');
            //调用模型方法 传参并进行处理
            $result = $model -> addData($post,$_FILES['thumb']);
            //判断是否成功
            if($result){
                //成功
                $this -> success('添加成功！',U('showlist'),3);
            }else{
                //失败
                $this -> error('添加失败！');
            }
        }else{
            //展示模板
            $this -> display();
        }
    }
    //知识列表
    public function showlist(){
        //实例化模型并查找数据
        $data = M('Knowledge') -> select();
        //向模板传递参数
        $this -> assign('data',$data);
        //展示模板
        $this -> display();
    }

    //图片下载
    public function download(){
        //接收id
        $id = I('get.id');
        //根据id查找数据
        $data = M("Knowledge") -> find($id);
        //dump($data);die;
        //下载代码
        $file = WORKING_PATH . $data['picture'];
        //输出文件
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment;filename="' . basename($file) .'"');
        header("Content-Length:" . filesize($file));
        //输出缓冲区
        readfile($file);
    }
    //知识修改
    public function edit(){
        //展示模板
        $this -> display();
    }
    //删除操作
    public function del(){
        echo "待续";
    }
}