<?php 
include('db.php');
if(isset($_POST['user_id']) && isset($_POST['password']))
{ 
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);
    $user_password = mysqli_real_escape_string($connect, $_POST['password']);
    if(empty($user_id)){
        header("location: login.php?error= error: ID를 입력하세요.");
        exit();
    }
    else if(empty($user_password)){
        header("location: login.php?error= error: PW를 입력하세요.");
        exit();
    }
    else{
        $sql = "SELECT * from user where id = '$user_id'";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
           $hash = $row['password'];
            if(password_verify($user_password,$hash)){
                session_start();
                $_SESSION['userid'] = $row["id"];
                $_SESSION['password'] = $row["password"];
                $_SESSION['user_name'] = $row["user_name"];
                print_r($_SESSION);
                echo $_SESSION['userid'];
                header("location: main.php");
                exit();
            }
            else{
                header("location: login.php?error= 로그인에 실패하였습니다.");
                exit();
            }

        }
        else{
                header("location: login.php?error= 존재하지 않은 ID입니다.");
                exit();
        }
    }
} 

?>