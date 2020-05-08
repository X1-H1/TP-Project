<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/2 0002
 * Time: 17:54
 */
//声明命名空间
namespace Admin\Controller;
//引入父类的控制器
use Think\Controller;
//声明类，并继承父类控制器
class UserController extends CommonController
{
    //职员添加方法
    public function add(){
        if(IS_POST){
            //处理表单提交
            //实例化模型
            $model = M('User');
            //创建数据对象 不传参数默认接收post数据
            $post = $model -> create();
            //追加当前时间
            $post['addtime'] = time();//dump($post);die;
            //写入数据中
            $result = $model -> add($post);
            //判断是否成功添加
            if($result){
                //成功
                $this -> success('成功添加！',U('showlist'));
            }else{
                //失败
                $this -> error('添加失败！');
            }

        }else{
            //获取部门信息
            $model = M('Dept');
            $data = $model -> field('id,name,pid') -> select();
            //加载文件
            load('@/tree');
            //调用方法
            $data = getTree($data);
            //传递参数
            $this -> assign('data',$data);
            //显示模板
            $this -> display();
        }

    }
    //职员列表方法
    public function showlist(){
        //实现分页效果
        //查询数据
        //实例化模型
        $model = M('User');

        //分页第一步 查询总数
        $count = $model -> count();
        //分页第二步 实例化分页类 并传递参数
        $page = new \Think\Page($count,2);
        //分页第三步 定制分页按钮的提示（可选）
        $page -> rollPage = 4;
        $page -> lastSuffix = false;
        $page -> setConfig('prev',"上一页");
        $page -> setConfig('next',"下一页");
        $page -> setConfig('first',"首页");
        $page -> setConfig('last',"末页");

        //分页第四步 使用show方法生成url
        $show = $page -> show();
        //分页第五步 查询数据
        //获取数据
        $data = $model -> field('t2.name as deptname,t1.*')
            -> table('sp_dept as t2,sp_user as t1')
            -> where('t2.id = t1.dept_id')
            -> limit($page -> firstRow,$page -> listRows) -> order('id asc') -> select();
//        dump($data); die;
        //传递参数 //分页第六步 传递个模板参数
        $this -> assign('data',$data);
        $this -> assign('show',$show);
        //显示模板 //分页第七步 展示模板
        $this -> display();
    }
    //职员编辑方法
    public function edit(){
        if(IS_GET){
            //接收传过来的id值
            $get = I('get.id');
            //实例化模型关联用户表
            $model = M('User');
            //关联部门表
            $model2 = M('Dept');
            //去查找对应id的用户数据
            $data = $model -> find($get);

            //查找部门
            $data2 = $model2 -> select();
            //加载文件 此处需要查询部门表
            load('@/tree');
            //调用getTree方法
            $data2 = getTree($data2);

            //传参数给模板
            $this -> assign('data',$data);
            //传部门参数
            $this -> assign('data2',$data2);
            //显示模板
            $this -> display();
        }else{
            //接收post传过来的
            $post = I('post.');
            //实例化模型关联用户表
            $model = M('User');

            //调用修改方法保存数据 save 方法只要有id就行了不需要讲id单独当参数传给save
            $result = $model -> save($post);
//            dump($result);die;
            //判断是否成功
            if($result){
                //成功
                $this -> success('修改成功！',U('showlist'));
            }else{
                //失败
                $this -> error('修改失败！');
            }
        }
    }
    //职员删除方法
    public function del(){
        if (IS_GET) {
            //接收传过来的数据
            $get = I("get.id");
            //实例化模型
            $model = M('User');
            //执行物理删除
            $data = $model->delete($get);
            //判断是否删除成功
            if ($data) {
                //删除成功
                $this->success('删除成功');
            } else {
                //删除失败
                $this->error('删除失败');
            }
        }
    }
    //职员图标统计
    public function charts(){
        //获取职员数据
        $model = M();
        //查询数据
        $data = $model -> field('t2.name as deptname,count(*) as count')
                    -> table('sp_dept as t2,sp_user as t1')
                    -> where('t2.id = t1.dept_id')
                    -> group('deptname')
                    -> select();
        $str = '[';
        foreach ($data as $key => $value){
            $str .= "['" . $value['deptname'] ."'," . $value['count'] . "],";
        }
        $str = rtrim($str,',');
        $str .= "]";
//        dump($str);die;
        //传递参数给模板
        $this -> assign('str',$str);
//        $this -> assign('str',$data);
        //显示模板
        $this -> display();
    }
}