<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24
 * Time: 15:39
 */
class CommentBook{
    const FILEPATH='comment.txt';
    public function getCommentList(){
        return unserialize(file_get_contents(self::FILEPATH));
    }
    public function write($comment){
        $commentList=$this->getCommentList();
        if (is_array($commentList)){
            array_unshift($commentList,$comment);
        }else{
            $commentList=array($comment);
        }
        $commentFile=fopen(self::FILEPATH,'w');
        fwrite($commentFile,serialize($commentList));
        fclose($commentFile);
    }
    public function read($page,$limit,$link){
        $commentList=$this->getCommentList();
        $totalCount=count($commentList);
        $totalPage=ceil($totalCount/$limit);
        if ($page<1){
            $page=1;
        }
        if ($page>$totalPage){
            $page=$totalPage;
        }
        $from=($page-1)*$limit;
        for ($i=$from;$i<$from+$limit;$i++){
            if (isset($commentList[$i])){
                echo 'username:'.$commentList[$i]['username'].'<br>content:'.$commentList[$i]['content'].'<hr>';
            }else{
                break;
            }
        }
        for ($i=1;$i<=$totalPage;$i++){
            echo "<a href='$link?page=$i&limit=$limit'>$i</a>";
        }
    }
}