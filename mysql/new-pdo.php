<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include_once 'db.php';

$conn=new PDO("mysql:host=127.0.0.1;dbname=news",$db['user'],$db['password']);

echo '====分割线，查询用户数据====</br></br>';
$sql='select * from user';
//PDO::prepare —准备要执行的SQL语句并返回一个 PDOStatement 对象
$command=$conn->prepare($sql);
//PDOStatement::execute — 执行一条预处理语句
$command->execute();
//PDOStatement::fetchAll — 返回一个包含结果集中所有行的数组
$userArr=$command->fetchAll();
if (count($userArr)>0){
    foreach ($userArr as $user){
        print_r($user);
        echo '<br>';
    }
}else{
    echo '没有数据';
}




echo '</br>====分割线，插入用户数据====</br>';
$username='邓紫棋';
$password='20180808';
//使用命名（:name）参数来准备SQL语句
$selectUserSql='select * from user where username=:username';
$command=$conn->prepare($selectUserSql);
//通过数组值向预处理语句传递真实的参数
$command->execute(array('username'=>$username));

$userArr=$command->fetchAll();
if (count($userArr)>0){
    echo '<br>该用户名'.$username.'已经存在<br>';
}else{
    $insertUserSql='insert into user(username,password) values(:username,:password)';
    $command=$conn->prepare($insertUserSql);
    $command->execute(array('username'=>$username,'password'=>$password));
    echo '<br>插入成功<br>';
}


echo '</br>====分割线，修改用户数据====</br>';
$username='邓紫棋';
$newPwd='1008610086';
$selectUserSql='select * from user where username=:username';
$command=$conn->prepare($selectUserSql);
$command->execute(array('username'=>$username));
$userAll=$command->fetchAll();
if (count($userAll)>0){
    $updateUserSql='update user set password=:password where username=:username';
    $command=$conn->prepare($updateUserSql);
    $command->execute(array('password'=>$newPwd,'username'=>$username));
    echo '<br>更新密码成功<br>';
}else{
    echo '<br>该用户名'.$username.'不存在<br>';
}

echo '</br>====分割线，删除用户数据====</br>';
$username='刘昊霖';
$selectUserSql='select * from user where username=:username';
$command=$conn->prepare($selectUserSql);
$command->execute(array('username'=>$username));
$userAll=$command->fetchAll();
if (count($userAll)>0){
    $deleteUserSql='delete from user where username=:username';
    $command=$conn->prepare($deleteUserSql);
    $command->execute(array(
        'username'=>$username
    ));
    echo '<br>删除用户'.$username.'成功<br>';
}else{
    echo '<br>该用户名'.$username.'不存在<br>';
}

$sql='select * from user';
$command=$conn->prepare($sql);
$command->execute();
$userAll=$command->fetchAll();
if (count($userAll)>0){
    foreach ($userAll as $user){
        print_r($user);
        echo '<br>';
    }
}else{
    echo '数据为空';
}
//关闭连接
$con = null;
?>
</body>
</html>