<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/30 0030
 * Time: 17:56
 */
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;

class DeptController extends CommonController
{
    //实例化模型方法
    public function shilihua(){
        /*
         * 在选用D或者M的方法时
         * 一般如果想调用的方法已经在父类中封装好了
         * 就采用M方法，如果需要对数据进行特殊处理，则用D方法调用用户自定义的模型类文件
         * */
        //普通方法实例化
        //$model = new \Admin\Model\DeptModel();
        //采用D方法实例化不传参数
        //$model = D();这里实例化的是父类模型
        //$model = D("Dept");传参数 此时实例化用户自定义的模型类文件

        //采用M方法实例化
        $model = M();//不穿参数直接实例化父类模型
        //$model = M("Dept");此时传递参数，也是直接实例化的父类模型，但是关联了数据表
        dump($model);
    }
    //添加记录
    public function tianjia(){
        //实例化模型
        $model = M("Dept");
        /*$data = array(
            'name'  =>  "人事部",
            'pid'   =>  "0",
            'sort'  =>  '1',
            'remark'=>  '这里是人事部门'
        );*/
        $data = array(
            array(
                'name'  =>  "行政部",
                'pid'   =>  "0",
                'sort'  =>  '2',
                'remark'=>  '这里是行政部门'
            ),
            array(
                'name'  =>  "总裁办",
                'pid'   =>  "0",
                'sort'  =>  '3',
                'remark'=>  '权利很大'
            ),
        );
        //add传的是一维关联数组，且数组的键要与表的字段相对应，否则会被过滤，不能成功添加对应字段的值
        //返回的是添加成功记录对应的主键值
        //$result = $model ->add($data);
        //addAll需要传递的是一个二维数组，最里层的数组要求和add的参数要求一致，其外面的
        //数组元素必须是从0开始切不间断的索引数组
        $result = $model -> addAll($data);
        dump($result);
    }
    //修改
    public function xiugai(){
        $model = M('Dept');
        $data = array(
            'id'    =>  '3',
            'remark'=>  '权利的最高部门'
        );
        //save函数传递的也是一个一维数组，必须要有主键id否则，不能修改
        //返回的是修改成功后所影响的行数
        $result = $model -> save($data);
        dump($result);
    }
    //查询
    public function chaxun(){
        $model = M('Dept');
        //使用selecet 方法返回的是二维数组
        //$data = $model -> select();//查询所有记录
        //$data = $model -> select(3);//查询指定Id的记录
        //$data = $model -> select('2,3');//查询id记录集
        //使用find 方法返回的是一个一维数组
        //$data = $model -> find();//相当于limit 1
        $data = $model -> find(3);//查询指定ID的记录

        //在这里没有指定id但也可以删除成功，因为在其前面执行了fiind方法
        //$data = $model -> delete();

        //打印
        dump($data);
    }
    //删除
    public function shanchu(){
        //实例化模型
        $model = M('Dept');
        //调用删除方法 函数返回的是删除成功后所影响的行数
        //$data = $model -> delete();//删除所有记录，但是在tp中是不允许的
        //$data = $model -> delete(5);//删除指定的id的记录
        $data = $model -> delete('3,4');//删除指定ID记录集的记录
        //打印
        dump($data);
    }

    //添加部门
    public function add(){
        //实例化模型
        $model = D("Dept");
        /**
         * tp提供了几个常量用来提供我们判断用户提交的数据是否有值
         * 有 IS_POST 如果是post 则其值为true 反之为false
         * IS_GET
         * IS_AJAX 如果是ajax 则其值为true 反之为false
         * IS_CGI
         * IS_PUT
         * 等等
         * */
        //判断数据类型是否为post
        if(IS_POST){
            /**目前到这里学到的快速方法有 U M D I
             * 接受post传过来的数据
             * 可以使用tp中快速方法 I 方法 具体参数说明可以参考手册
             * 它可以接受任何传过来的数据类型（post get put ajax request）
             * I('数据类型 . 传过来数据的name值')这是接收单个数据
             * I('数据类型 . ') 这是接收整个数组
             */
            //接收post传过来的数据
            //$data1 = I('post.');
            //create 创建数据对象，有两个参数，默认接收post数据，并且返回处理后的data数据
            $data1 = $model -> create();

            //dump($model->getError());die();

            //create 中有自动验证，成功返回data数据，失败返回false
            //验证规则需要我们用户自己写
            //判断自动验证是否 成功
            if(!$data1){
                //getError是接受错误信息
                $this -> error($model->getError());
                exit();
            }
            //dump($data1);die();
            //写入数据库
            //$result = $model -> add($data1);
            $result = $model -> add();
            //dump($data1);
            //判断写入数据库是否成功
            if($result){
                $this -> success("部门添加成功！",U('showlist'),3);
            }else{
                $this -> error("部门添加失败！");
            }
        }else{
            //暂时先查出顶级部门
            $data2 = $model -> where('pid = 0') -> select();
            //向模板传递参数
            $this -> assign('data',$data2);
            //显示添加部门模板
            $this -> display();
        }
    }
    //showlist 显示部门列表
    public function showlist(){
        //实例化模型
        $model = M('Dept');
        //获取数据
        $data = $model -> order('sort asc') -> select();
        //根据pid去数据库中再次查找其父类名称
        foreach ($data as $key => $value){
            if($value['pid'] > 0){
                $info = $model -> find($value['pid']);
                $data[$key]['deptname'] = $info['name'];
                //dump($data);die();
            }
        }
        //加载无极限分类的文件
        load('@/tree');
        //调用getTree方法
        $data = getTree($data);
        //给模板传参
        $this -> assign("data",$data);
        //显示模板
        $this -> display();
    }
    //编辑部门
    public function edit(){
        if(IS_POST){
            //接收数据
            $post = I('post.');
            //关联表
            $model= D("Dept");
            //修改
            $data = $model -> save($post);
            if($data !== false){
                //成功
                $this -> success('修改成功',U('showlist'));
            }else{
                //失败
                $this -> error('修改失败');
            }
        }else{
            //接收id
            $id = I("get.id");
            //实例化模型
            $model = D('Dept');
            //获取数据
            $data = $model -> find($id);
            //查询所有的上级部门
            $info = $model -> where("id != " . $data['id']) -> select();
            //传参给模板
            $this -> assign('data',$data);
            $this -> assign('info',$info);
            //展示模板
            $this -> display();
        }
    }
    //删除
    public function del()
    {
        if (IS_GET) {
            //接收传过来的数据
            $get = I("get.id");
            //实例化模型
            $model = M('Dept');
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
}