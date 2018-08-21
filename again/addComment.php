<?php
//print_r($_POST);
$username=$_POST['username'];
$content=$_POST['content'];

if ($username==''||$content==''){
    echo json_encode(array('code'=>1,'msg'=>'用户名或评论内容不能为空'));
}else{
    $filePath='commentBook.txt';
    $comment=array('username'=>$username,'content'=>$content);
    $commentList=unserialize(file_get_contents($filePath));

    if (is_array($commentList)){
        array_unshift($commentList,$comment);
    }else{
        $commentList=array($comment);
    }

    $commentFile=fopen($filePath,'w');
    fwrite($commentFile,serialize($commentList));
    fclose($commentFile);

    echo json_encode(array('code'=>0,'msg'=>'评论成功'));
}