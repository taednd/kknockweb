<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인페이지</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="title-box">
        <div class="main-title">
            <p>메인페이지</p>
        </div>
        <div>
        <?php
        if (isset($_SESSION['userid'])) { ?>
        <?php echo $_SESSION['user_name']; ?>님
        <button class="button" onclick="location.href='logout.php'">로그아웃</button>
        <?php
        } 
        else {
        ?>
        <button class="button" onclick="location.href='login.php'">로그인</button>
        <?php
        }
    ?>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <a href="list.php" class="top">자유게시판</a>
        </div>
        
    </main>
</body>
</html> 