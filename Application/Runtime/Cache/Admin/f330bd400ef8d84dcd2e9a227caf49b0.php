<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>知识列表</title>
    <script src="/Public/Admin/js/jquery-3.2.1.min.js"></script>
    <style>
        .s{
            text-align: center;
            background-color: rgb(232,241,247);
        }
        table tr{
            border: none;
            height: 32px;
            line-height: 32px;
            text-align: center;
        }
        .d{
            background-color: rgb(239,246,250);
        }
        .ss{
            background-color: white;
        }
    </style>
</head>
<body>
<table border="1" cellspacing="0" rules="1" width="1000">
    <thead>
    <tr class="s">
        <td>序号</td>
        <td>标题</td>
        <td>缩略图</td>
        <td>内容</td>
        <td>作者</td>
        <td>添加时间</td>
        <td>操作</td>
        <td><a class="del" href="javascript:;">删除</a></td>
    </tr>
    </thead>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            <td class="id"><?php echo ($vol["id"]); ?></td>
            <td style="text-align: left;"><?php echo (msubstr($vol["title"],0,8)); ?></td>
            <td>
                <img src="<?php echo ($vol["thumb"]); ?>">
                <?php if(!empty($vol["picture"])): ?>【<a href="/index.php/Admin/Knowledge/download/id/<?php echo ($vol["id"]); ?>">下载</a>】<?php endif; ?>
            </td>
            <td><?php echo (msubstr($vol["content"],0,20)); ?></td>
            <td><?php echo ($vol["author"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$vol["addtime"])); ?></td>
            <td>
                <a href="/index.php/Admin/Knowledge/edit/id/<?php echo ($vol["id"]); ?>">编辑</a>
            </td>
            <td><input type="checkbox" value="<?php echo ($vol["id"]); ?>"></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<script>
    var tr = document.getElementsByTagName('tr');
    //    alert(tr[1].className);
    for(var i = 0; i < tr.length;i++){
        if(i % 2 != 0){
            tr[i].className = "ss";
        }else {
            tr[i].className = "d";
        }
    }

    //jQuery代码
    $('.del').on('click',function () {
        //事件处理程序
        var id_obj = $(':checkbox:checked');//获取checkbox
        var id = "";
        //循环遍历value的值 将value的值组成 v1,v2,v3...
        for(var i = 0; i < id_obj.length; i++){
            id += id_obj[i].value + ",";
        }
        //去掉最后的逗号
        id = id.substr(0,id.length - 1);
        //带着参数跳转到del方法
        window.location.href = "/index.php/Admin/Knowledge/del/id/" + id;
        //console.log(id);
    });
</script>
</body>
</html>