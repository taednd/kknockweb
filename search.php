<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
    table {
        border-top: 2px solid #2a2929;
        border-collapse: collapse;
    }

    tr {
        border-bottom: 2px solid #2a2929;
        padding: 10px;
    }

    td {
        border-bottom: 2px solid #2a2929;
        padding: 10px;
    }

    table .even {
        background: #cdcdcd;
    }

    .text {
        text-align: center;
        padding-top: 20px;
        color: #000000
    }

    .text:hover {
        text-decoration: underline;
    }

    a:link {
        color: #57A0EE;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>

<?php
session_start();
$cate = $_GET['cate'];
$search = $_GET['search'];
$connect = mysqli_connect('localhost', 'root', '0000', 'login') or die ("connect fail");
$sql = "SELECT * FROM board WHERE $cate LIKE '%$search%' ORDER BY no desc";
$res = mysqli_query($connect, $sql);
$row_num = mysqli_num_rows($res);
$result =mysqli_query($connect, $sql);
$total = mysqli_num_rows($result);
?>
<?php       
if (isset($_SESSION['userid'])) { ?>
<b> <?php echo $_SESSION['user_name']; ?></b>님
    <button onclick="location.href='logout.php'">로그아웃</button>
<?php
} 
else {
?>
    <button onclick="location.href='login.php'">로그인</button>
<?php
}
?>
  <h1 align=center><?php echo $cate; ?> : '<?php echo $search; ?>' 검색결과</h1>
  <h2 align=center>게시판</h2>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
            </tr>
        </thead>
        <tbody>
            <?php
        while($rows = mysqli_fetch_assoc($result)){ 
                if($total%2==0){ ?>
            <tr class="even">
                <?php   } ?>
                <td width="50" align="center">
                    <?php echo $total?>
                </td>
                <td width="500" align="center">
                    <a href="view.php?number=<?php echo $rows['no']?>">
                        <?php echo $rows['title']?>
                </td>
                <td width="100" align="center">
                    <?php echo $rows['name']?>
                </td>
                <td width="200" align="center">
                    <?php echo $rows['date']?>
                </td>
                <td width="50" align="center">
                    <?php echo $rows['views']?>
                </td>
            </tr>
            <?php
                $total--;
                }
        ?>
        </tbody>
    </table>
    <div class=text>
    <form action="search.php" method="get">
      <select name="cate">
        <option value="title">제목</option>
        <option value="name">작성자</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>                
    <div class=text>
        <button onClick="location.href='write.php'">글쓰기</button>
    </div>
</body>

</html>