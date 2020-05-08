<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>邮件发送</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>收件人：</td>
            <td>
                <select name="to_id">
                    <option>请选择收件人...</option>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["truename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>标题：</td>
            <td>
                <input type="text" name="title">
            </td>
        </tr>
        <tr>
            <td>附件：</td>
            <td>
                <input type="file" name="file">
            </td>
        </tr>
        <tr>
            <td>内容：</td>
            <td>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="提交">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
</body>
</html>