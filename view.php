<?php
$connect = mysqli_connect('localhost', 'root', '0000', 'login');
$number = $_GET['number'];
session_start();
$query = "SELECT title, content, date, views, id, name, file from board where no =$number";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);
$views = "UPDATE board set views = views + 1 where no = $number";
$connect->query($views);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
</head>
<style>
    .view_table {
        border: 3px solid #444444;
        margin-top: 30px;
    }

    .view_title {
        height: 30px;
        text-align: center;
        background-color: #b2d1ea;
        width: 1000px;
    }

    .view_id {
        text-align: center;
        background-color: #b7cada;
        width: 30px;
    }

    .view_id2 {
        text-align: center;
        background-color: white;
        width: 60px;
    }

    .view_views {
        background-color: #b7cada;
        width: 30px;
        text-align: center;
    }

    .view_views2 {
        background-color: white;
        width: 60px;
        text-align: center;
    }

    .view_content {
        padding-top: 20px;
        border-top: 2px solid #444444;
        height: 500px;
        background-color: white;
    }

    .view_button {
        width: 700px;
        height: 200px;
        text-align: center;
        margin: auto;
        margin-top: 50px;
    }

    .view_btn1 {
        height: 50px;
        width: 100px;
        font-size: 20px;
        text-align: center;
        background-color: white;
        border: 2px solid black;
        border-radius: 10px;
    }

    .view_comment_input {
        width: 700px;
        height: 500px;
        text-align: center;
        margin: auto;
    }

    .view_text3 {
        font-weight: bold;
        float: left;
        margin-left: 20px;
    }

    .view_com_id {
        width: 100px;
    }

    .view_comment {
        width: 500px;
    }

    .comment_box .comment_form textarea {
        resize: none;
        width: 1000px;
        height: 100px;
        align=center
    }

    .comment_view {
        padding: 10px 0 15px 0;
        border-bottom: solid 2px gray;
        margin: 0 250px 0 250px;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        word-break: break-all;
    }
    .btn{
        display: inline-block;
    }
</style>

<body>
    <?php
if (isset($_SESSION['userid'])) { ?>
    <b>
        <?php echo $_SESSION['user_name']; ?>
    </b>님
    <button onclick="location.href='logout.php'">로그아웃</button>
    <?php
} 
else {
?>
    <button onclick="location.href='login.php'">로그인</button>
    <?php
}
?>
    <table class="view_table" align=center>
        <tr>
            <td colspan="4" class="view_title">
                <?php echo $rows['title']?>
            </td>
        </tr>
        <tr>
            <td class="view_id">작성자</td>
            <td class="view_id2">
                <?php echo $rows['name']?>
            </td>
            <td class="view_views">조회수</td>
            <td class="view_views2">
                <?php echo $rows['views'] + 1 ?>
            </td>
        </tr>


        <tr>
            <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']?>
            </td>
        </tr>

        <tr>
            <td>
                파일 : <a href="../<?php echo $rows['file'];?>" download>
                    <?php echo $rows['file']; ?>
                </a>
            </td>
        </tr>
    </table>



    <div class="view_button">
        <button onclick="location.href='list.php'">목록으로</button>
        <?php
    if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
        <button onclick="location.href='modify.php?number=<?= $number ?>'">수정</button>
        <button onclick="ask();">삭제</button>
        <script>
            function ask() {
                if (confirm("게시글을 삭제하시겠습니까?")) {
                    window.location = "./delete.php?number=<?= $number ?>"
                }
            }
        </script>
        <?php } ?>
    </div>
    <div class="container">
        <div class="comment_box" align=center>
            <form class="comment_form" action="comment.php?number=<?php echo $number; ?>" method="post">
                <textarea name="contents" placeholder="댓글을 작성해주세요." required></textarea>
                <input type="hidden" name="comment" value="<?=$uid?>" />
                <div style="margin-top: 8px">
                    <button type="submit">댓글등록</button>
                </div>
            </form>
        </div>
        <h3 align=center>댓글목록</h3>
        <?php
            $sql3 ="select * from comment where board_number='".$number."' order by no desc";
            $result3 =mysqli_query($connect, $sql3);
            while($comment = mysqli_fetch_array($result3)){
        ?>
        <div class="comment_view">
            <div><b><?php echo $comment['name'];?></b></div>
            <div><?php echo nl2br("$comment[content]"); ?></div>
            
            <?php
    if (isset($_SESSION['userid']) and $_SESSION['userid'] == $comment['id']) { ?>
                    <div class="btn">
                    <form action="comment_delete.php" method="post">
                        <input type="hidden" name="rno" value="<?php echo $comment['no']; ?>" />
                        <input type="submit" value="삭제">
                        <input type="hidden" name="bno" value="<?php echo $number; ?>">
                    </form>
                    </div>
                    <div class="btn">
                    <form method="post" action="comment_modify.php">
                        <input type="submit" value="수정">
                        <input type="hidden" name="rno" value="<?php echo $comment['no']; ?>" />
                        <input type="hidden" name="bno" value="<?php echo $number; ?>">
                    </form>
                    </div>
                <?php } ?>
        </div>

        <?php } ?>
    </div>
</body>

</html>
