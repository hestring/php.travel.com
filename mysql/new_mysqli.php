<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include_once 'db.php';
// 创建连接
$conn=new mysqli($db['server'],$db['user'],$db['password'],$db['database']);
// 检测连接
if ($conn->connect_error){
    exit('连接失败：'.$conn->connect_error);
}

echo '====分割线，查询用户数据====</br></br>';
$sql="select * from user";
$result=$conn->query($sql);
if ($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        print_r($row);
        echo '<br>';
    }
}else{
    echo '没有数据';
}


echo '</br>====分割线，插入用户数据====</br>';
$username='刘昊霖';
$password='111111';
$selectUserSql="select * from user where username='$username'";
$result=$conn->query($selectUserSql);
if ($result->num_rows>0){
    echo '<br>该用户名已存在<br>';
}else{
    $insertUserSql="insert into user(username,password) values('$username','$password')";
    if ($conn->query($insertUserSql)){
        echo '<br>插入成功<br>';;
    }
}



echo '</br>====分割线，删除用户数据====</br>';
$username='刘昊霖';
$password='20180826';
$selectUserSql="select * from user where username='$username'";
$result=$conn->query($selectUserSql);
if ($result->num_rows>0){
    $updateUserSql="update user set password='$password' where username='$username'";
    if ($conn->query($updateUserSql)){
        echo '<br>修改密码成功<br>';
    }
}else{
    echo '<br>该用户名不存在<br>';
}

//关闭连接
$conn->close();
?>
</body>
</html>