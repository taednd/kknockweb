<?php 
include('db.php');
if(isset($_POST['user_id']) && isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['re_password']))
{ 
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);
    $user_name = mysqli_real_escape_string($connect, $_POST['user_name']);
    $user_password = mysqli_real_escape_string($connect, $_POST['password']);
    $user_repassword = mysqli_real_escape_string($connect, $_POST['re_password']);

    if(empty($user_id)){
        header("location: signup.php?error= error: ID를 입력하세요.");
        exit();
    }
    else if(empty($user_name)){
        header("location: signup.php?error= error: 이름을 입력하세요.");
        exit();
    }
    else if(empty($user_password)){
        header("location: signup.php?error= error: PW를 입력하세요.");
        exit();
    }
    else if(empty($user_repassword)){
        header("location: signup.php?error= error: PW를 재입력하세요.");
        exit();
    }
    else if($user_password !== $user_repassword){
        header("location: signup.php?error= error: 비밀번호가 일치하지 않습니다.");
        exit();
    }
    else{
        //암호화
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
        //아이디 중복체크
        $sql_same = "SELECT * FROM user where id ='$user_id'";
        //mysqli_query(db접속, 명령을 수행);
        $order = mysqli_query($connect, $sql_same);

        if(mysqli_num_rows($order) === 1){
            header("location: signup.php?error= error: 이미 존재하는 ID입니다.");
            exit(); 
        }
        else{
            $sql_save = "insert into user(id, user_name, password) values('$user_id','$user_name','$user_password')";
            $result = mysqli_query($connect, $sql_save);

            if($result){
                header("location: signup.php?success= 가입에 성공하였습니다.");
                exit();
            }
            else{
                header("location: signup.php?error= 가입에 실패하였습니다.");
                exit();
            }
        }
    }    
} 

?>