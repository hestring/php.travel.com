<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{
            /*border: 1px solid #000;*/
        }
        table,th,td{
            /*border: 1px solid #000;*/
            /*border-collapse: collapse;*/
            text-align: center;
            margin: 0;
            padding: 0;
        }
        td:nth-of-type(2) input,td:nth-of-type(2) textarea{
            /*border: none;*/
            outline: none;
            border: 1px dashed #999;
            width: 200px;
            height: 30px;
            font: 20px/30px '微软雅黑', sans-serif;
            padding: 0;
        }
        input[type=button]{
            border: 1px solid #000;
            outline: none;
            background: #eee;
            border-radius: 10px;
            width: 200px;
            height: 30px;
            padding: 0;
        }
    </style>
</head>
<body>
<form action="addComment.php" method="post">
    <table>
        <tr>
            <td>
                <label for="username">用户名：</label>
            </td>
            <td>
                <input type="text" id="username" name="username">
            </td>
        </tr>
        <tr>
            <td>
                <label for="content">评论内容：</label>
            </td>
            <td>
                <textarea id="content" name="content"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
<!--                <input type="submit">-->
                <input type="button" value="ajax" id="submit">
            </td>
        </tr>
    </table>
    <?php
        $commentList=unserialize(file_get_contents('commentBook.txt'));
        $totalCount=count($commentList);
        $page=isset($_GET['page'])?intval($_GET['page']):1;
        $limit=isset($_GET['limit'])?intval($_GET['limit']):2;
        $totalPage=ceil($totalCount/$limit);

        $from=($page-1)*$limit;
        for ($i=$from;$i<$from+$limit;$i++){
            if (isset($commentList[$i])){
                echo '用户名：'.$commentList[$i]['username'].'<br>评论内容：'.$commentList[$i]['content'].'<hr>';
            }else{
                break;
            }

        }

        for ($i=1;$i<=$totalPage;$i++){
            echo "<a href='commentBook.php?page=$i&limit=$limit'>$i</a>";
        }
    ?>
    <script src="jquery-3.3.1.js"></script>
    <script>
        $('#submit').click(function () {
            $.ajax({
                url:'addComment.php',
                type:'post',
                dataType:'json',
                data:{
                    'username':$('#username').val(),
                    'content':$('#content').val()
                },
                success:function (data) {
                    alert(data.msg);
                    if (!data.code){
                        window.location.reload();
                    }
                }
            });
        });
    </script>
</form>
</body>
</html>