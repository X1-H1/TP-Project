<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/24 0024
 * Time: 17:10
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller
{
    public function test(){
        echo phpinfo();
    }

    public function show()
    {
    	echo "do what you can do!";
    }
}