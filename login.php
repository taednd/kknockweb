<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>로그인</title>
    
</head>
<body>

    <div class="container">
        <div class="box form-box">
            <header>로그인</header>
            <form action="check.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
            <p><?php echo $_GET['error']; ?></p>
             <?php } ?>
                <div class="field input">
                    <label>ID</label>
                    <input type="text" name="user_id" placeholder="아이디를 입력하세요.">
                </div>
                <div class="field input">
                    <label>PW</label>
                    <input type="password" name="password" placeholder="비밀번호를 입력하세요.">
                </div>
                <div class="field">
                    <button type="submit" class="button">Login</button>
                </div>
                <div class="link">
                    <a href="signup.php">회원가입</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>