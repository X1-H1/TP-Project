<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test5</title>
</head>
<body>
hmtl的常规注释：<!--html 的常规注释--><br>
行注释：<br>
块注释：<br>
使用[]形式输出tp中的数组值：<?php echo ($arr[0]); ?> - <?php echo ($arr[1]); ?> - <?php echo ($arr[2]); ?> - <?php echo ($arr[3]); ?> - <?php echo ($arr[4]); ?><br>
使用.形式输出tp中的数组值：<?php echo ($arr["0"]); ?> - <?php echo ($arr["1"]); ?> - <?php echo ($arr["2"]); ?> - <?php echo ($arr["3"]); ?> - <?php echo ($arr["4"]); ?><br>
<hr>
使用[]形式输出tp中的数组值：<?php echo ($arr2[0][0]); ?> - <?php echo ($arr2[0][1]); ?> - <?php echo ($arr2[1][0]); ?> - <?php echo ($arr2[1][1]); ?>
<?php echo ($arr2[2][0]); ?> - <?php echo ($arr2[2][1]); ?>
<?php echo ($arr2[3][0]); ?> - <?php echo ($arr2[3][1]); ?>
<?php echo ($arr2[4][0]); ?> - <?php echo ($arr2[4][1]); ?><br>
使用.形式输出tp中的数组值：<?php echo ($arr2["0"]["0"]); ?> - <?php echo ($arr2["0"]["1"]); ?> -
<?php echo ($arr2["1"]["0"]); ?> - <?php echo ($arr2["1"]["1"]); ?> -
<?php echo ($arr2["2"]["0"]); ?> - <?php echo ($arr2["2"]["1"]); ?> -
<?php echo ($arr2["3"]["0"]); ?> - <?php echo ($arr2["3"]["1"]); ?> -
<?php echo ($arr2["4"]["0"]); ?> - <?php echo ($arr2["4"]["1"]); ?><br>
</body>
</html>