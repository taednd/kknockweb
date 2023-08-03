<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>회원가입</title>

</head>
<body>
    <div class="container">
        <div class="box form-box">
            <form action="save.php" method="post">
            <?php if(isset($_GET['error'])){ ?>
            <p><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])){ ?>
            <p><?php echo $_GET['success']; ?></p>
            <?php } ?>
                <header>회원가입</header>
                <div class="field input">
                    <label>이름</label>
                    <input type="text" name="user_name" placeholder="이름을 입력하세요">
                </div>
                <div class="field input">
                    <label>ID</label>
                    <input type="text" name="user_id" placeholder="아이디를 입력하세요.">
                </div>
                <div class="field input">
                    <label>PW</label>
                    <input type="password" name="password" placeholder="비밀번호를 입력하세요.">
                </div>
                <div class="field input">
                    <label>PW확인</label>
                    <input type="password" name="re_password" placeholder="비밀번호를 재입력하세요.">
                </div>
                <div class="field">
                    <button type="submint" class="button">Sign Up</button>
                </div>
                <div class="link">
                    <a href="login.php">로그인 화면</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>