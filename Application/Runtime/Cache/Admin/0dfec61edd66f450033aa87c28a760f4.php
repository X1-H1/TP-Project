<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录界面</title>
    <link rel="stylesheet" href="/Public/Admin/css/style.css">
</head>
<body>
    <div class="login">
        <form action="#" method="post">
            <div>用户名:<input type="text" name="user" title="请输入用户名"/></div>
            <div>密&nbsp;&nbsp;&nbsp;码:<input type="password" name="pwd" title="请输入密码"/></div>
            <div>验证码:<input type="text" name="yzm" title="请输入验证码"/></div>
            <button type="submit" name="submit">登录</button>
        </form>
    </div>
</body>
</html>