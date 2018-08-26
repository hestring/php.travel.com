<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include_once 'db.php';
//@用于抑制错误提示信息显示在页面上
$conn=@mysql_connect($db['server'],$db['user'],$db['password']);
if (!$conn){
    die('连接错误：'.mysql_error());  //流程控制语句 输出一个消息并退出脚本
}
//mysql_select_db() 函数选取数据库
mysql_select_db($db['database'],$conn);

echo '====分割线，查询用户数据====</br></br>';
$sql="select * from user";
// mysql_query() 函数。该函数用于向 MySQL 发送查询或命令
$result=mysql_query($sql);
if ($result){
    /*
  * mysql_fetch_array() 函数以数组的形式从记录集返回第一行(字段名字作为数组的key)
  * 每个随后对 mysql_fetch_array() 函数的调用都会返回记录集中的下一行
  * while语句会循环记录集中的所有记录
  */
    while($row=mysql_fetch_array($result)){
        print_r($row);
        echo '<br>';
    }
}
echo '</br>====分割线，插入用户数据====</br>';
//由于用户名唯一，因此，插入用户数据前，需要检查用户名是否存在
$username='php8090';
$password='123456';
//串数据需要引号包裹，因此在编写SQL的时候，不要忘记给串值写少引号
$selectUsernameSql="select * from user where username='$username'";
echo $selectUsernameSql;
$result=mysql_fetch_array(mysql_query($selectUsernameSql));
if (!$result){
    $insertSql="insert into user(username,password) values('$username','$password')";
    echo $insertSql;
    /*
    * mysql_query() 仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，如果查询执行不正确则返回 FALSE。
    * 对于其它类型的 SQL 语句，mysql_query() 在执行成功时返回 TRUE，出错时返回 FALSE。
    */
    if (mysql_query($insertSql)){
        echo '</br>插入成功</br>';
    }else{
        echo '</br>插入失败</br>';
    }
}else{
    echo "</br>该用户名 $username 已经存在</br>";
}

echo '</br>====分割线，修改用户数据====</br>';
//在修改用户数据前需要检查该用户是否存在，一般的表都是依据主键ID修改表字段，由于用户表username唯一，因此可以使用username作为依据
$username='php8090';
$newPwd=$username;
$selectUsernameSql="select * from user where username='$username'";
$result=mysql_fetch_array(mysql_query($selectUsernameSql));
if ($result){
    $updatePwdSql="update user set password='$newPwd' where username='$username'";

    if (mysql_query($updatePwdSql)){
        echo '</br>修改成功</br>';
    }

}else{
    echo '</br>该用户不存在</br>';
}

echo '</br>====分割线，删除用户数据====</br>';
$username='php1';
$selectUsernameSql="select * from user where username='$username'";
$result=mysql_fetch_array(mysql_query($selectUsernameSql));
if ($result){
    $deleteUserSql="delete from user where username='$username'";
    if (mysql_query($deleteUserSql)){
        echo '<br>删除成功！<br>';
    }
}else{
    echo '</br>该用户不存在</br>';
}

echo '</br>====分割线，查询用户数据====</br></br>';
$sql="select * from user";
$result=mysql_query($sql);
if ($result){
    while($row=mysql_fetch_array($result)){
        print_r($row);
        echo '<br>';
    }
}
//关闭连接资源
mysql_close($conn);
?>
</body>
</html>