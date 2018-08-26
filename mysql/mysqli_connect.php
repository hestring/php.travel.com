<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include_once 'db.php';
$conn=mysqli_connect($db['server'],$db['user'],$db['password'],$db['database']);
if (!$conn){
    exit('连接错误：'.mysqli_connect_error());
}

echo '====分割线，查询用户数据====</br></br>';
$sql="select * from user";
//mysqli_query() 函数执行某个针对数据库的查询
$result=mysqli_query($conn,$sql);
//mysqli_num_rows() 函数返回结果集中行的数量
if (mysqli_num_rows($result)>0){
    /*
     * mysqli_fetch_assoc() 函数从结果集中取得一行作为数组(字段名字作为数组的key)
     * while语句会循环记录集中的所有记录
     */
    while($row=mysqli_fetch_assoc($result)){
        print_r($row);
        echo '<br>';
    }
}else{
    echo '没有数据';
}

echo '</br>====分割线，插入用户数据====</br>';
$username='php2018';
$password='123123';
$selectUserSql="select * from user where username='$username'";
$result=mysqli_query($conn,$selectUserSql);
if (!mysqli_num_rows($result)){
    $insertUserSql="insert into user(username,password) values('$username','$password')";
    if (mysqli_query($conn,$insertUserSql)){
        echo '<br>插入成功<br>';
    }
}else{
    echo '<br>该用户名已经存在<br>';
}


echo '</br>====分割线，修改用户数据====</br>';
$username='php2018';
$newPwd=$username;
$selectUserSql="select * from user where username='$username'";
$result=mysqli_query($conn,$selectUserSql);
if (mysqli_num_rows($result)>0){
    $updatePwd="update user set password='$newPwd' where username='$username'";
    if (mysqli_query($conn,$updatePwd)){
        echo '<br>修改成功<br>';
    }
}else{
    echo '<br>该用户名不存在<br>';
}


//关闭连接
mysqli_close($conn);
?>

</body>
</html>