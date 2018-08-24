<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="jquery-3.3.1.js"></script>
    <script>
        $(function () {
            $('#button').on('click',function () {
                $.ajax({
                    url:'addComment.php',
                    type:'post',
                    dataType:'json',
                    data:{
                        "username":$('#username').val(),
                        "content":$('#content').val()
                    },
                    success:function (data) {
                        alert(data.msg);
                        if (!data.code){
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
<form>
    <label for="username">username:</label>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="content">content:</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <br><br>
    <input type="button" value="OK" id="button">
</form>
<?php
    include 'commentBook.php';
    $page=isset($_GET['page'])?intval($_GET['page']):1;
    $limit=isset($_GET['limit'])?intval($_GET['limit']):3;
    $commentBook=new CommentBook();
    $commentBook->read($page,$limit,'comment.php');
?>
</body>
</html>