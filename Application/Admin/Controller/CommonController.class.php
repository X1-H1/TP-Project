<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/12 0012
 * Time: 9:59
 */
//声明命名空间
namespace Admin\Controller;
//引入父类的命名空间
use Think\Controller;
//声明并继承父类
class CommonController extends Controller
{
    //php自带的构造函数
    /*public function __construct(){
        parent::__construct();//此处需要调用静态方法调用父类的构造方法，否则子类不能调用爷爷类的方法
        echo "Day end!";
    }*/
    //tp中的构造方法
    public function _initialize(){
        $id = session('id');
        if(empty($id)){
            //echo "请登录！";die;
            //用JavaScript代码跳转，否则当前页面跳转会出现无限嵌套的问题
            $url = U('Public/login');
            echo "<script>top.location.href='$url'</script>";
            die();
        }

        //处理RBAC
        $roles_id = session('role_id');//获取用户对应的角色组id
        $rabc_roles_auths = C(RBAC_ROLES_AUTHS);//获取所有的角色组
        $current_auths = $rabc_roles_auths[$roles_id];//用户根据角色组id取得对应的权限
        //dump($current_auths);die;

        //获取用户当前所在的控制器和方法
        $controller = strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME);
        //根据用户角色 给予不同的权限
        if($roles_id >1){
            //顶级boss没有权限限制
            if(!in_array($controller.'/'.$action, $current_auths) && !in_array($controller.'/*', $current_auths)){
                $this -> error('对不起，您还没有相应的权限！',U('Index/right'));exit;
                //echo U('Index/index');die;
            }
        }
    }

}