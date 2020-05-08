<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29 0029
 * Time: 18:10
 */
//声明命名空间
namespace Admin\Controller;
//引入父类的命名空间
use Think\Controller;

class PublicController extends Controller
{
    //登录界面
    public function login(){
        $this->display();
        //fetch获取模板的内容
        //$str = $this->fetch();
        //echo $str;
    }
    //生成验证码
    public function captcha(){
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
    //验证登录
    public function checklogin(){
        //接收数据 此处验证不是数据中的字段所有就不用创建数据对象
        $data = I('post.');
        //先验证验证码 后验证用户名和密码
        $verify = new \Think\Verify();
        $result = $verify -> check($data['yzm']);
        if($result){
            //验证用户名和密码
            $model = M('User');
            //将data中的验证数据删除后，到数据库中查找用户名和密码是否匹配
            unset($data['yzm']);
            //根据传过来的数据去数据库中验证
            // 问题：无论是否传用户名都能成功
            //导致此问题是因为模板文件提交的字段 name 与数据库中的字段不一致，
            //从而数据被过滤，相当于没有where条件（可以采用字段映射的方法）
            $data1 = $model -> where($data) -> find();
            //判断是否成功
            if($data1){
                //成功 将用户的部分信息保存到session中 永久化 跳转到后台首页
                session('id',$data1['id']);
                session('username',$data1['username']);
                session('role_id',$data1['role_id']);
                $this -> success('登录成功！',U('index/index'),3);
            }else{
                //失败
                $this -> error('用户名或密码不正确');
            }
        }else{
            //验证码错误
            $this -> error('验证码不正确');
        }
    }
    //退出系统
    public function logout(){
        //销毁session
        session(null);
        $this -> success('成功退出',U('login'));
    }
}