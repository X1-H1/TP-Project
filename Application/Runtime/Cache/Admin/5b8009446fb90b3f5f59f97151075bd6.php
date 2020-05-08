<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test7</title>
</head>
<body>
当前时间是：<?php echo (date("Y-m-d H:i:s",$tim)); ?><hr>
<?php echo (strtoupper(substr($str,0,6))); ?>
<hr>
个性签名：<?php echo ((isset($s) && ($s !== ""))?($s):"这个家伙很懒，什么都没有留下。。。"); ?>
<hr>
变量a的值：<?php echo ($a); ?><br>
变量b的值：<?php echo ($b); ?><br>
a+b=<?php echo ($a + $b); ?><br>
a-b=<?php echo ($a - $b); ?><br>
a*b=<?php echo ($a * $b); ?><br>
a/b=<?php echo ($a / $b); ?><br>
a++=<?php echo ($a ++); ?><br>
++a=<?php echo ++$a ;?><br>
b--=<?php echo ($b --); ?><br>
--b=<?php echo --$b ;?><br>

</body>
</html>