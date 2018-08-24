<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24
 * Time: 15:33
 */
include "commentBook.php";
$username=$_POST['username'];
$content=$_POST['content'];
if ($username==''||$content==''){
    echo json_encode(array('code'=>1,'msg'=>'用户名或密码不能为空'));
}else{
    $comment=array(
        'username'=>$username,
        'content'=>$content,
    );
    $commentBook=new CommentBook();
    $commentBook->write($comment);
    echo json_encode(array('code'=>0,'msg'=>'评论成功'));
}

