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
<form action="/index.php/Admin/User/edit" method="post">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
    <table>
        <tr>
            <td class="l">用户名：</td>
            <td><input type="text" name="username" value="<?php echo ($data["username"]); ?>"></td>
        </tr>
        <tr>
            <td class="l">密码：</td>
            <td><input type="password" name="password" value="<?php echo ($data["password"]); ?>"></td>
        </tr>
        <tr>
            <td class="l">姓名：</td>
            <td><input type="text" name="truename"  value="<?php echo ($data["truename"]); ?>"></td>
        </tr>
        <tr>
            <td class="l">昵称：</td>
            <td><input type="text" name="nickname" value="<?php echo ($data["nickname"]); ?>"></td>
        </tr>
        <tr>
            <td class="l">所属部门：</td>
            <td>
                <select name="dept_id" id="">
                    <option>请选择</option>
                    <?php if(is_array($data2)): foreach($data2 as $key=>$for): ?><option value="<?php echo ($for["id"]); ?>" <?php if($for["id"] == $data["dept_id"] ): ?>selected='selected'<?php endif; ?>><?php echo (str_repeat('&emsp;',$for["level"])); echo ($for["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="l">性别：</td>
            <td>
                <input type="radio" name="sex" value="男" <?php if($data["sex"] == '男'): ?>checked='checked'<?php endif; ?>/>男
                <input type="radio" name="sex" value="女" <?php if($data["sex"] == '女'): ?>checked='checked'<?php endif; ?>/>女
            </td>
        </tr>
        <tr>
            <td class="l">生日：</td>
            <td><input value="<?php echo ($data["birthday"]); ?>" type="text" name="birthday" onclick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})"></td>
        </tr>
        <tr>
            <td class="l">联系电话：</td>
            <td><input value="<?php echo ($data["tel"]); ?>" type="text" name="tel"></td>
        </tr>
        <tr>
            <td class="l">邮箱：</td>
            <td><input value="<?php echo ($data["email"]); ?>" type="text" name="email"></td>
        </tr>
        <tr>
            <td class="l">备注：</td>
            <td>
                <textarea name="remark" cols="30" rows="10"><?php echo ($data["remark"]); ?></textarea>
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