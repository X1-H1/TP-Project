<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <script src="/Public/Admin/js/jquery-3.2.1.min.js"></script>
    <script src="/Public/Admin/js/jquery-1.12.4.min.js"></script>
    <style>
        .content{
            width: 170px;
            border: 1px solid gray;
            display: inline-block;
            margin-top: 10px;
        }
        .content>div{
            border:1px solid cyan;
        }
        .content span a{
            color: #f60;
            display: inline-block;
            width: 170px;
            height: 50px;
            font-family:微软雅黑;
            text-align: center;
            line-height: 50px;
            text-decoration: none;
            background-color: rgb(233,233,233);
            border-bottom: 1px solid black;
        }
        .content span a:hover{
            background-color: rgb(200,200,200);
        }
        .tit{
            display: inline-block;
            width: 170px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: #fff;
            background-color:rgb(110,198,115);
            cursor: pointer;
        }
        .aa{
            /*border: 1px solid #000000;*/
            display: none;
        }
        .aa span{

        }
        .aaa{
            text-decoration: none;
        }
    </style>
</head>
<body>
<h1>欢迎 <?php echo (session('username')); ?></h1>
<a id="out" href="JavaScript:;">退出</a>
<span>
    <a class="aaa" target="main" href="<?php echo U('Email/recBox');?>">消息</a>
    <a class="aaa acc" target="main" href="<?php echo U('Email/recBox');?>">0</a>
</span>
<hr>
<div class="content">
    <div>
        <span class="tit tt5">邮件管理</span>
        <div class='aa'>
            <span><a href="../Email/send.html" target="main">发邮件</a></span>
            <span><a href="<?php echo U('Email/recBox');?>" target="main">收件箱</a></span>
            <span><a href="<?php echo U('Email/sendBox');?>" target="main">发件箱</a></span>
        </div>
    </div>
    <div>
        <span class="tit tt4">知识管理</span>
        <div class='aa'>
            <span><a href="../Knowledge/showlist.html" target="main">知识列表</a></span>
            <span><a href="<?php echo U('Knowledge/add');?>" target="main">知识添加</a></span>
        </div>
    </div>
    <div>
        <span class="tit tt3">公文管理</span>
        <div class='aa'>
            <span><a href="../Doc/showlist.html" target="main">公文列表</a></span>
            <span><a href="<?php echo U('Doc/add');?>" target="main">添加公文</a></span>
        </div>
    </div>
    <div>
        <span class="tit tt2">职员管理</span>
        <div class='aa'>
            <span><a href="../User/showlist.html" target="main">职员列表</a></span>
            <span><a href="<?php echo U('User/add');?>" target="main">添加职员</a></span>
        </div>
    </div>
    <div>
        <span class="tit tt1">部门管理</span>
        <div class='aa'>
            <span><a href="../Dept/showlist.html" target="main">部门列表</a></span>
            <span><a href="<?php echo U('Dept/add');?>" target="main">部门添加</a></span>
        </div>
    </div>
</div>

<iframe class="ifr" src="right.html" name="main" frameborder="1" height="500" width="1100" ></iframe>
<script>
    var a = document.getElementById('out');
    a.onclick = (function () {
        var r = confirm('你确定要退出系统么？');
        if(r == true){
            window.location.href='/index.php/Admin/Public/logout';
        }
        return false;
    });

    //jquery 实现菜单折叠
    $(function(){
        $('.tit').click(function () {
            $(this).next().slideToggle(400).parent().siblings().children('div').slideUp(400);
            //console.log($('.aa'));
        });
    });

    function addPraiseNum() {
        var praiseObjs = document.getElementsByClassName('ml-praise');
        for (var i = 0; i < praiseObjs.length; i++) {
            var praiseObj = praiseObjs[i];
            praiseObj.onclick = (function (dingObj) {
                return function () {
                    dingObj.innerHTML = parseInt(dingObj.innerHTML) + 1;
                };
            })(praiseObj.getElementsByClassName('ding-num')[0]);
        }
    }
    //jquery展示消息
    //获取邮件数的函数
    function getMsgCount(){
        $.get("<?php echo U('Email/getMsgCount');?>",function (data) {
            $('.acc').text(data);
        });
    }
    $(function () {
        setInterval(getMsgCount,3000);
    });
</script>
</body>
</html>