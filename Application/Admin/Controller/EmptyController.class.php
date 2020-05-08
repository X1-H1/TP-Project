<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28 0028
 * Time: 17:36
 */
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并继承父类
class EmptyController extends Controller
{
    //这里的空操作 只有在找不到控制器的时候才会执行这个空控制器
    //然后执行下面的空方法
    public function _empty(){
        $this -> display('Empty/error');
    }
}