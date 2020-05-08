<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公文编辑</title>
    <style>
        table tr{
            height: 32px;
            line-height: 32px;
        }
        .lt{
            text-align: center;
        }
    </style>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/plugin/Uedit/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/plugin/Uedit/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/plugin/Uedit/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table width="1000">
        <tr>
            <td class="lt">标题</td>
            <td>
                <input type="text" name="title" value="<?php echo ($data["title"]); ?>">
                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
            </td>
        </tr>
        <tr>
            <td class="lt">附件</td>
            <td>
                <input type="file" name="file">
                说明：如需要修改上传文件请点击，留空表示不修改
            </td>
        </tr>
        <tr>
            <td class="lt">作者</td>
            <td>
                <input type="text" name="author" value="<?php echo ($data["author"]); ?>">
            </td>
        </tr>
        <tr>
            <td class="lt">内容</td>
            <td>
                <script id="editor" name="content" type="text/plain" style="width:800px;height:300px;">
                    <?php echo (htmlspecialchars_decode($data["content"])); ?>
                </script>
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
<script>
    var ue = UE.getEditor('editor');
</script>
</html>