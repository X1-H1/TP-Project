<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>部门添加</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>部门名称</td>
                <td><input type="text" name="xh1"></td>
            </tr>
            <tr>
                <td>上级部门</td>
                <td>
                    <select name="xh2">
                        <option value="0">顶级部门</option>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>排序</td>
                <td><input type="text" name="xh3"></td>
            </tr>
            <tr>
                <td>部门描述</td>
                <td><textarea name="xh4" rows="8" cols="22"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="提交">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>