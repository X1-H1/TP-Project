<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>知识添加页面</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="">
    <table>
        <tr>
            <td>标题：</td>
            <td>
                <input type="text" name="title">
            </td>
        </tr>
        <tr>
            <td>缩略图：</td>
            <td>
                <input type="file" name="thumb">
            </td>
        </tr>
        <tr>
            <td>作者：</td>
            <td>
                <input type="text" name="author">
            </td>
        </tr>
        <tr>
            <td>描述：</td>
            <td>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
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
                <input type="submit" value="确定">
                <input type="reset" value="清空内容">
            </td>
        </tr>
    </table>
</form>
</body>
</html>