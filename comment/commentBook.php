<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="addComment.php" method="post">
    <label for="username">用户名：</label>
    <input id="username" name="username" size="35">
    <br>
    <br>
    <label for="content">评论内容：</label>
    <textarea id="content" name="content"></textarea>
    <br>
    <br>
    <input type="submit">
</form>
<?php
    $commentList=unserialize(file_get_contents('commentBook.txt'));
    $totalCount=count($commentList);  //10

    $page=isset($_GET['page'])?intval($_GET['page']):1;
    $limit=isset($_GET['limit'])?intval($_GET['limit']):3;

    $totalPage=ceil($totalCount / $limit); //4
    if ($page<1){
        $page=1;
    }
    if ($page>$totalPage){
        $page=$totalPage;
    }

    $from=($page-1)*$limit;//******
    for ($i=$from;$i<$from+$limit;$i++) {
        if(isset($commentList[$i])) {
            echo '用户名：'.$commentList[$i]['username'].'<br>评论内容：'. $commentList[$i]['content'].'<hr>';
        }else {
            break;
        }
    }
    $prevPage=$page-1;
    $nextPage=$page+1;
    if ($page>1){
        echo "<a href='commentBook.php?page=$prevPage&limit=$limit'>上一页</a>";
    }
    for($i=1;$i<=$totalPage;$i++){
        echo "<a href='commentBook.php?page=$i&limit=$limit'>$i</a> ";
    }
    if ($page<$totalPage){
        echo "<a href='commentBook.php?page=$nextPage&limit=$limit'>下一页</a>";
    }
?>
<script src=""></script>
</body>
</html>