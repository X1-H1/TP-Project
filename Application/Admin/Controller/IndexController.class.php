<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/1 0001
 * Time: 20:36
 */
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并继承父类
class IndexController extends CommonController
{
    public function index(){
        //展示后天首页的模板
        $this -> display();
    }
}