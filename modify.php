<?php
$connect = mysqli_connect('localhost', 'root', '0000', 'login');
$number = $_GET['number'];
session_start();
$query = "SELECT title, content, date, views, id, name from board where no =$number";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);
$title = $rows['title'];
$content = $rows['content'];
$name = $rows['name'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
</head>
<body>
    <form action="modify_save.php" method="post">
        <table style="padding-top:50px" align=center width=700 border=0 cellpadding=2>
            <tr>
                <td height=20 align=center bgcolor=#ccc>
                    <font color=white> 글쓰기</font>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table>
                        <tr>
                            <td>작성자</td>
                            <td><input type="hidden" name="id" value="<?$_SESSION['userid']?>">
                                <?=$_SESSION['user_name']?>
                            </td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type=text name="title" size=60 value="<?=$title ?>"></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=85 rows=15><?=$content ?></textarea></td>
                        </tr>

                    </table>
                    <center>
                        <input type="hidden" name="number" value="<?= $number ?>">
                        <input type="submit" value="작성">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>