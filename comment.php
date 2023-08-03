
<?php
	$connect = mysqli_connect("localhost", "root", "0000", "login") or die("fail");
    session_start();
    $bnumber = $_GET['number'];
    $bname = $_SESSION['user_name'];
    $id= $_SESSION['userid'];

    if($bnumber && $_SESSION['user_name'] && $_POST['contents']){
        
        $sql ="insert into comment(board_number,name,content,id) 
        values('".$bnumber."','".$bname."','".$_POST['contents']."','".$id."')";
        $result1 = mysqli_query($connect, $sql);
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='view.php?number=$bnumber';</script>";
    }
    else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
    
?>

