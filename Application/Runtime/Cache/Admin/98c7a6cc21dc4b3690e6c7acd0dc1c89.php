<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test8-数组的遍历</title>
</head>
<body>
<div>
    <h2>一维数组的遍历</h2>
    采用volist遍历数组：<br>
    <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; echo ($vol); ?> --<?php endforeach; endif; else: echo "" ;endif; ?>
    <br>
    采用foreach遍历数组：<br>
    <?php if(is_array($arr1)): foreach($arr1 as $key=>$for): echo ($for); ?> --<?php endforeach; endif; ?>
</div>
<div>
    <h2>二维数组的遍历</h2>
    采用volist遍历数组：<br>
    <?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if(is_array($vol)): $i = 0; $__LIST__ = $vol;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); ?> --<?php endforeach; endif; else: echo "" ;endif; ?>
        <br><?php endforeach; endif; else: echo "" ;endif; ?>
    <br>
    采用foreach遍历数组：<br>
    <?php if(is_array($arr2)): foreach($arr2 as $key=>$for): echo ($for["0"]); ?> --<?php echo ($for[1]); ?>
        <br><?php endforeach; endif; ?>
</div>
</body>
</html>