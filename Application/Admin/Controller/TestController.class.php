<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;

class TestController extends Controller{
    public function test(){
        // echo U("test");
        $time = date("Y-m-d H:i:s");
        $this -> assign("time",$time);
        $this -> display();

    }
    public function test1(){
        //测试tp的跳转函数 success
        $this -> success("成功跳转！",U("test"),5);
    }
    public function test2(){
        //测试tp失败跳转函数 error
        $this->error("跳转失败！",U("test1"),6);
    }
    public function test3(){
        $time = date("Y-m-d H:i:s");
        $this -> assign("time",$time);
    	$this -> display("test");
    }
    public function test4(){
        $this -> assign("key","Hello");
        $this -> display();
    }
    public function test5(){
        $arr = array("美国","俄国","法国","英国","中国");
        $arr2 = array(
            array("纽约","华盛顿"),
            array("威尼斯","莫斯科"),
            array("巴黎","凡尔赛"),
            array("伦敦","苏格兰"),
            array("上海","北京")
        );
        $this->assign("arr", $arr);
        $this->assign("arr2", $arr2);
        $this->display();
    }
    public function test6(){
        $obj = new Student();
        $obj -> id = 323;
        $obj -> name = "张三";
        $obj -> sex = "男";

        $this -> assign("obj",$obj);
        $this -> display();
    }
    public function test7(){
        $tim = time();
        $str = "qwdsjSdfjldSDjk";
        $this->assign("tim",$tim);
        $this->assign("str",$str);

        $s = "我是可爱的小尾巴！";
        $this->assign("s",$s);

        $a = 100;
        $b = 10;
        $this->assign("a",$a);
        $this->assign("b",$b);
        $this->display();
    }
    public function head(){
        $this->display();
    }
    public function body(){
        $this->display();
    }
    public function foot(){
        $this->display();
    }

    public function test8(){
        $arr1 = array("美国","俄国","法国","英国","中国");
        $arr2 = array(
            array("纽约","华盛顿"),
            array("威尼斯","莫斯科"),
            array("巴黎","凡尔赛"),
            array("伦敦","苏格兰"),
            array("上海","北京")
        );
        $this->assign("arr1",$arr1);
        $this->assign("arr2",$arr2);
        $this->display();
    }
    //sql调试
    public function test9(){
        //实例化模型
        $model = M('Dept');
        //查询
        echo $model->getLastSql();
        $data = $model -> select();
        echo "<br>".$model->_sql();
    }
    //性能调试
    public function test10(){
        //G方法开始
        G("start");
        //需要执行的代码段
        for ($i=0;$i < 100000;$i++){
            echo $i;
        }
        //G方法结束
        G("stop");
        echo "<hr>";
        //统计时间
        //前面两个是开始和结束标识符
        //第三个参数是数字或者字母m 数字表示精确到小数点后几位，m表示内存开销
        echo G("start","stop",5);
    }
    //AR模式实现添加数据
    public function test11(){
        //实例化模型 关联表 映射到表
        $model = M("Dept");
        //设置字段属性值，关联表中字段 映射到表中字段
        $model -> id = 3;
        $model -> name = "总裁办";
        $model -> pid = 0;
        $model -> sort = 3;
        $model -> remark ="这个部门全力很高";
        //调用方法 关联结果为表中的一条记录 映射记录
        $result = $model->add();
        dump($result);
    }
    //AR模式实现修改操作
    public function test12(){
        //实例化模型
        $model = M("Dept");
        //设置所要操作的主键ID值
        $model -> id = 3;
        $model -> sort = 5;
        //调用方法
        $result = $model -> save();
        dump($result);
    }
    //AR模式实现删除操作
    public function test13(){
        //实例化模型
        $model = M("Dept");
        //设置主键ID值
        $model -> id = 3;//如果需要批量删除可以设置为 ='1,2,3'
        //调用方法
        $result = $model -> delete();
        dump($result);
    }
    //AR模式没有查询操作，需要查询操作可以用 find select 方法
    //AR模式也可以通过不指定 id 值的方式实现修改和删除操作
    // 在执行这些操作之前执行了find方法
    public function test14(){
        //实例化模型
        $model = M("Dept");
        //执行find方法
        $model -> find(3);

        //执行修改save操作
        //$model -> sort = 13;
        //$result = $model -> save();

        //执行delete操作
        $result = $model -> delete();
        dump($result);
    }
    //辅助方法where
    //where 方法和having方法都可以表示条件查询
    //但是二者查询的条件不一样，where要求查询的字段是数据表中的字段
    //而having条件要求是结果集中的字段
    public function test15(){
        //实例化模型
        $model = M("Dept");
        //调用where方法
        $model -> where('id > 8');
        //查询
        $data = $model -> select();
        //打印
        dump($data);
    }
    //limit方法 ，有两种方式limit(n) n:大于零的数字
    //limit（n，偏移量）
    public function test16(){
        //实例化模型
        $model = M("Dept");
        //limit方法
        //$model -> limit(3);
        $model -> limit(2,3);
        //select方法
        $data = $model -> select();
        //打印
        dump($data);
    }
    //field 方法 所需要的参数就是常规sql语句select与from之间的字段
    public function test17(){
        //实例化模型
        $model = M("Dept");
        //field 方法
        $model -> field("id,sort");
        //select 方法
        $data = $model -> select();
        //打印
        dump($data);
    }
    //order方法 父类中没有真实的方法
    public function test18(){
        //实例化模型
        $model = M("Dept");
        //order方法
        $model -> order("id desc");
        //select 方法
        $data = $model -> select();
        //打印
        dump($data);
    }
    //group 方法 父类中没有真实的方法
    public function test19(){
        //实例化模型
        $model = M("Dept");
        //eg:查询按姓名分组
        //field方法
        $model -> field('name,count(*) as count');
        //group方法
        $model -> group('name');
        //select方法
        $data = $model -> select();
        //打印
        dump($data);
    }
    //连贯操作 将操作写在一行里
    public function test20(){
        //实例化模型
        $model = M("Dept");
        /*连贯操作
         *开头是模型的实例，结尾是curd方法，中间是辅助方法，理论上辅助方法是没有先后顺序的
         *只要大的顺序没错就可以了，但是实际上还是以常规sql语句的顺序来依次调用辅助方法比较好
         *这样可以方便代码的阅读，辅助方法返回的是调用的模型对象所以可以依次调用辅助方法
         * 但是curd方法返回的则不是模型对象，所以curd方法放在最后
        */
        $data = $model -> field('name,count(*) as count') -> group("name") -> select();
        //打印
        dump($data);
    }
    //查询函数 count 统计查询函数返回的都是数字值 但是是以字符串形式显示的
    public function test21(){
        //实例化模型
        $model = M("Dept");
        //count
        $data = $model -> count();
        //打印
        dump($data);
    }
    //查询函数 max
    public function test22(){
        //实例化模型
        $model = M("Dept");
        //max
        $data = $model -> max('id');
        //打印
        dump($data);
    }
    //查询函数 min
    public function test23(){
        //实例化模型
        $model = M("Dept");
        //min
        $data = $model -> min('id');
        //打印
        dump($data);
    }
    //查询函数 avg
    public function test24(){
        //实例化模型
        $model = M("Dept");
        //avg
        $data = $model -> avg('id');
        //打印
        dump($data);
    }
    //查询函数 sum
    public function test25(){
        //实例化模型
        $model = M("Dept");
        //sum
        $data = $model -> sum('id');
        //打印
        dump($data);
    }
    /**fetchSql
     * 方法可以返回所要执行的sql语句 但是不会执行这条语句，
     *方便我们调试的时候查看sql语句，而getLastSql和_sql则是返回成功执行后的
     *最近的那条语句，也就是说不成功的话，就不会返回sql语句
     * 可以理解为辅助方法，因为它放的位置和辅助方法放的位置是一样的
     */
    public function test26(){
        //实例化模型
        $model = M("Dept");
        //执行fetchSql
        $data = $model -> field('name,count(*) as count') -> group("name") -> fetchSql(true) -> select();
        //打印
        dump($data);
    }

    //session
    public function test27(){
        //1、设置
        session('name','xh');
        session('name2','today');
        //2、用变量读取session的值
        $n = session('name');
        //3、删除指定name的session值
        //session('name',null);
        //4、读取所有的session值
        //dump(session());
        //5、删除所有的session值
        //session(null);
        //6、判断session是否存在 成功返回true 失败返回false
        dump(session('?name'));
    }
    //cookie
    public function test28(){
        //1、设置
        cookie('name','xh1');
        //2、为cookie设置时间
        cookie('name2','xh2',500);
        //3、读取cookie
        $n = cookie('name');
        dump($n);
        //4、删除单个cookie
        //cookie('name2',null);
        //5、删除所有的cookie 下面方法有bug需要到functions.php文件中修改点东西
        //cookie(null);
        //6、查询所有的cookie
        dump(cookie());
    }

    //调用函数库文件 文件位置 application\common\common\function.php
    public function test29(){
        getMethod('第一种方法：调用函数库文件');
    }
    //通过load_ext_file 文件在 application\common\common\info.php
    // 此方法需要定义 load_ext_file 配置项 在什么级别定义就在什么级别调用
    public function test30(){
        getSecond('load_ext_file');
    }
    //通过load方法 局限于分组 定义的文件在 admin\common\third.php 分组里
    public function test31(){
        //load 参数为不带 .php 的文件名
        load('@/third');
        //调用方法
        getThird("load");
    }
    //常规验证码
    public function test32(){
        //配置验证相关数据
        $cfg = array(
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        //实例化验证码类
        $verify = new \Think\Verify($cfg);
        //输出验证码
        $verify -> entry();
    }
    //中文验证码
    public function test33(){
        //配置验证相关数据
        $cfg = array(
            'fontSize'  =>  20,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'length'    =>  4,               // 验证码位数
            'useZh'     =>  true,           // 使用中文验证码
        );
        //实例化验证码类
        $verify = new \Think\Verify($cfg);
        //输出验证码
        $verify -> entry();
    }
    //table方法实现关联查询 查找出用户所属部门
    public function test34(){
        $model = M();//加不加表名没意义，下面table给出了表名
        //$sql = "SELECT t2.name as deptname,t2.id,t1.*
        //        FROM sp_dept as t2,sp_user as t1
        //       WHERE t2.id =  t1.dept_id";
        //$data = $model -> query($sql);
        $data = $model -> field('t2.name as deptname,t2.id,t1.*')
                    -> table('sp_dept as t2,sp_user as t1')
                    -> where('t2.id =  t1.dept_id')
                    -> select();
        dump($data);
    }
    //join 方法实现表间关联 自关联查找出pid对应的部门
    public function test35(){
        $model = M('Dept');
        /*
        $sql = "SELECT t1.*,t2.name
                from sp_dept as t2
               right JOIN sp_dept as t1
                on t2.id = t1.pid";
        */
        $data = $model ->field('t1.*,t2.name')
                    -> alias('t2')
                    -> join('right JOIN sp_dept as t1 on t2.id = t1.pid')
                    -> select();
        dump($data);

    }
    //测试ip
    public function test36(){
        //获取ip 参数默认为空，传递1 的话是将客户端ip转为数字地址
        echo get_client_ip(1);
    }
    //根据ip获取对应的物理地址
    public function test37(){
        //实例化获取ip信息工具类
        $ip = new \Org\Net\IpLocation();
        //调用方法
        $data = $ip ->getlocation();
        dump($data);
    }
}