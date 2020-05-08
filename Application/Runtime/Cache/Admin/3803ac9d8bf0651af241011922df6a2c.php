<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>收件箱</title>
    <script src="/Public/Admin/js/jquery-3.2.1.min.js"></script>
    <script src="/Public/Admin/plugin/layer/layer.js"></script>
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
        <td>发件人</td>
        <td>标题</td>
        <td>附件</td>
        <td>内容</td>
        <td>发送时间</td>
        <td>状态</td>
        <td>操作</td>
        <td><a class="del" href="javascript:;">删除</a></td>
    </tr>
    </thead>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            <td class="id"><?php echo ($vol["id"]); ?></td>
            <td style="text-align: left;"><?php echo ($vol["tn"]); ?></td>
            <td><?php echo (msubstr($vol["title"],0,8)); ?></td>
            <td><?php echo ($vol["filename"]); ?>
                <?php if($vol["hasfile"] == 1): ?>【<a href="/index.php/Admin/Email/download/id/<?php echo ($vol["id"]); ?>">下载</a>】<?php endif; ?>
            </td>
            <td><?php echo (msubstr($vol["content"],0,10)); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$vol["addtime"])); ?></td>
            <td>
                <?php if($vol["isread"] == 0): ?><span style="color: red;">未读</span>
                <?php else: ?>
                <span style="color: violet;">已读</span><?php endif; ?>
            </td>
            <td>
                <a href="javascript:;" class="show" isread="<?php echo ($vol["isread"]); ?>" data="<?php echo ($vol["id"]); ?>" data-title="<?php echo ($vol["title"]); ?>">查看</a>
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
$('.show').on('click',function () {
    var id = $(this).attr('data');
    var title = $(this).attr('data-title');
    //通过追加属性判断是否是已读，如果是已读的话则在关闭层的时候不刷新页面，否则刷新页面
    var isread = $(this).attr('isread');
    layer.open({
        type: 2,
        title: title,
        shadeClose: true,
        shade: false,
        maxmin: true, //开启最大化最小化按钮
        area: ['893px', '450px'],
        content: "/index.php/Admin/Email/getContent/id/" + id,
        end:function(){
            if(isread == 0){
                window.location.href = location.href;
                //window.location.reload();
            }
        }
    });
});
</script>
</body>
</html>