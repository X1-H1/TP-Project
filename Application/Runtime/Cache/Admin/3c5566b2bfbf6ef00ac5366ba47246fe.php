<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录界面</title>
    <link rel="stylesheet" href="/Public/Admin/css/style.css">
</head>
<body>
    <div class="login">
        <form action="/index.php/Admin/Public/checklogin" method="post">
            <table>
                <tr>
                    <td>用户名:</td>
                    <td><input type="text" name="username" title="请输入用户名"/></td>
                </tr>
                <tr>
                    <td>密&nbsp;&nbsp;&nbsp;码:</td>
                    <td><input type="password" name="password" title="请输入密码"/></td>
                </tr>
                <tr>
                    <td>验证码:</td>
                    <td>
                        <input type="text" name="yzm" title="请输入验证码"/>
                    </td>
                    <td><img class="capt" src="/index.php/Admin/Public/captcha" onclick="this.src='/index.php/Admin/Public/captcha/d/'+Math.random();"></td>
                </tr>
                <tr>
                    <td><button type="submit">登录</button></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>