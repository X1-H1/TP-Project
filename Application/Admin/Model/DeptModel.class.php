<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/30 0030
 * Time: 17:44
 */
//声明命名空间
namespace Admin\Model;
//引入父类的命名空间
use Think\Model;

class DeptModel extends Model
{
    //字段映射定义
    protected $_map =   array(
        //以键值的形式来实现映射 模板中的name值做键 数据库中的字段名做值
        'xh1'  => 'name',
        'xh2'  => 'pid',
        'xh3'  => 'sort',
        'xh4'  => 'remark'
    );

    //开启批量验证
    //protected $patchValidate = true;

    // 自动验证定义

    protected $_validate     =  array(
        /**
         * array()共有六个参数，前三个必选项，后三个选填项
         * 第四个参数默认是 0
         */
        //部门名称不能为空，且不能与已有部门名称重复
        array('name','require',"部门名称不能为空！"),
        array('name','','部门已经存在！',0,'unique'),
        //排序必须是数字
        //array('sort','number',"排序必须是数字！"),
        //使用函数来验证sort 函数可以写在函数库内，也可以写在当前模型里面，或者是PHP内置的函数
        array('sort','is_numeric',"排序必须是数字！",0,'function')
    );
}