<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="color: <?php echo 'green';?>">
html:Are you ok?<br>
<?php
echo "php:I'm fine,thank you,and you?";
?>
<br>
html:你怎么带了一个分号尾巴啊？<br>
<?php
echo "php:PHP语句都必须一一个分号(;)结束";
?>
<br>
<?php
echo "php:不写这个分号可能会出错";
?>
<script>
    alert('<?php echo "php中的JS";?>');

</script>
</body>
</html>