<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>职员列表</title>
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
        /*分页按钮效果开始*/
        .current{
            width: 31px;
            height:31px;
            display: inline-block;
            border: 1px solid black;
            background-color: rgb(94,188,98);
            margin: 0 5px;
            border-radius: 3px;
        }
        .num{
            width: 31px;
            height:31px;
            display: inline-block;
            border: 1px solid black;
            background-color: rgb(223,240,255);
            margin: 0 5px;
            border-radius: 3px;
            text-decoration: none;
        }
        .num:hover{
            background-color: rgb(184,223,251);
        }

        .next{
            width: 62px;
            height:31px;
            display: inline-block;
            border: 1px solid black;
            background-color: rgb(223,240,255);
            margin: 0 5px;
            border-radius: 3px;
            text-decoration: none;
        }
        .next:hover{
            background-color: rgb(184,223,251);
        }

        .prev{
            width: 62px;
            height:31px;
            display: inline-block;
            border: 1px solid black;
            background-color: rgb(223,240,255);
            margin: 0 5px;
            border-radius: 3px;
            text-decoration: none;
        }
        .prev:hover{
            background-color: rgb(184,223,251);
        }

        .first{
            width: 41px;
            height:31px;
            display: inline-block;
            border: 1px solid black;
            background-color: rgb(223,240,255);
            margin: 0 5px;
            border-radius: 3px;
            text-decoration: none;
        }
        .first:hover{
            background-color: rgb(184,223,251);
        }

        .end{
            width: 41px;
            height:31px;
            display: inline-block;
            border: 1px solid black;
            background-color: rgb(223,240,255);
            margin: 0 5px;
            border-radius: 3px;
            text-decoration: none;
        }
        .end:hover{
            background-color: rgb(184,223,251);
        }

        /*分页效果按钮结束*/
    </style>
</head>
<body>
<table border="1" cellspacing="0" rules="1" width="1000">
    <tr>
        <td colspan="12"><a href="/index.php/Admin/User/charts">统计</a></td>
    </tr>
    <tr class="s">
        <td>序号</td>
        <td>用户名</td>
        <td>姓名</td>
        <td>昵称</td>
        <td>所属部门</td>
        <td>性别</td>
        <td>生日</td>
        <td>电话</td>
        <td>邮箱</td>
        <td>添加时间</td>
        <td>操作</td>
        <td><a class="del" href="javascript:;">删除</a></td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vol["id"]); ?></td>
            <td><?php echo ($vol["username"]); ?></td>
            <td><?php echo ($vol["truename"]); ?></td>
            <td><?php echo ($vol["nickname"]); ?></td>
            <td><?php echo ($vol["deptname"]); ?></td>
            <td><?php echo ($vol["sex"]); ?></td>
            <td><?php echo ($vol["birthday"]); ?></td>
            <td><?php echo ($vol["tel"]); ?></td>
            <td><?php echo ($vol["email"]); ?></td>
            <td><?php echo (date('Y-m-d H:i:s',$vol["addtime"])); ?></td>
            <td><a href="/index.php/Admin/User/edit/id/<?php echo ($vol["id"]); ?>">编辑</a></td>
            <td><input type="checkbox" value="<?php echo ($vol["id"]); ?>"></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="12"><?php echo ($show); ?></td>
    </tr>
</table>
</body>
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
        window.location.href = "/index.php/Admin/User/del/id/" + id;
//        console.log(id);
    });
</script>
</html>