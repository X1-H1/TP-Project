<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array('__ADMIN__' => '/Public/Admin'),
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'db_oa',     // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',      // 端口
    'DB_PREFIX'             =>  'sp_',       // 数据库表前缀

    //开启页面跟踪信息
    'SHOW_PAGE_TRACE'       =>  true,//默认是false

    //动态加载 定义load_ext_file，用于加载文件 值为不带 .php 的文件名
    LOAD_EXT_FILE           => 'info',

    //RBAC
    //角色组
    'RBAC_ROLES'            => array(
                                '1' => '高层管理',
                                '2' => '中层管理',
                                '3' => '普通职员'
                            ),
    //角色组对应的权限组
    'RBAC_ROLES_AUTHS'      => array(
                                '1' => "*/*",
                                '2' => array('dept/*','doc/*','email/*','index/*'),
                                '3' => array('knowledge/*','user/*','index/*')
                            )
);