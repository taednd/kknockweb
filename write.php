<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
session_start();
$URL = "login.php";
if(!isset($_SESSION['userid'])) {
?>
    <script>
        alert("로그인이 필요합니다");
        location.replace("<?php echo $URL?>");
    </script>
<?php } ?>

    <form action="write_save.php" method="post" enctype="multipart/form-data">
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
                            <td><input type=text name="title" size=60 required></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=85 rows=15 required></textarea></td>
                        </tr>
                        <tr>
                            <td>파일첨부</td>
                            <td><input type="file" name="file"></td>
                        </tr>

                    </table>
                    <center>
                        <input type="submit" value="작성">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
