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
                <td>
                    <input name="id" value="<?php echo ($data["id"]); ?>" type="hidden">
                    <input type="text" value="<?php echo ($data["name"]); ?>" name="name">
                </td>
            </tr>
            <tr>
                <td>上级部门</td>
                <td>
                    <select name="pid">
                        <option value="0">顶级部门</option>
                        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>" <?php if($vol["id"] == $data["pid"] ): ?>selected='selected'<?php endif; ?>><?php echo ($vol["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>排序</td>
                <td><input type="text" value="<?php echo ($data["sort"]); ?>" name="sort"></td>
            </tr>
            <tr>
                <td>部门描述</td>
                <td><textarea name="remark" rows="8" cols="22"><?php echo ($data["remark"]); ?></textarea></td>
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