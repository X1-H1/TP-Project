<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加职员</title>
    <style>
        table tr{
            height: 32px;
            line-height: 32px;
        }
        .l{
            text-align: right;
        }
    </style>
    <script type="text/javascript" src="/Public/Admin/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/plugin/My97DatePicker/WdatePicker.js"></script>
</head>
<body>
<form action="/index.php/Admin/User/add" method="post">
    <table>
        <tr>
            <td class="l">用户名：</td>
            <td><input type="text" name="username" placeholder="用户名"></td>
        </tr>
        <tr>
            <td class="l">密码：</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td class="l">姓名：</td>
            <td><input type="text" name="truename"></td>
        </tr>
        <tr>
            <td class="l">昵称：</td>
            <td><input type="text" name="nickname"></td>
        </tr>
        <tr>
            <td class="l">所属部门：</td>
            <td>
                <select name="dept_id" id="">
                    <option>请选择</option>
                    <?php if(is_array($data)): foreach($data as $key=>$for): ?><option value="<?php echo ($for["id"]); ?>"><?php echo (str_repeat('&emsp;',$for["level"])); echo ($for["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="l">性别：</td>
            <td>
                <input type="radio" name="sex" value="男">男
                <input type="radio" name="sex" value="女">女
            </td>
        </tr>
        <tr>
            <td class="l">生日：</td>
            <td><input type="text" name="birthday" onclick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"></td>
        </tr>
        <tr>
            <td class="l">联系电话：</td>
            <td><input type="text" name="tel"></td>
        </tr>
        <tr>
            <td class="l">邮箱：</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td class="l">备注：</td>
            <td>
                <textarea name="remark" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit">
                <input type="reset">
            </td>
        </tr>
    </table>
</form>
</body>

</html>