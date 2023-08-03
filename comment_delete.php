<?php
$connect = mysqli_connect('localhost', 'root', '0000', 'login') or die("connect failed");
$rno = $_POST['rno'];
$number = $_POST['bno'];

$sql ="select * from comment where no='".$rno."'";
$sql ="delete from comment where no='".$rno."'"; 
$result = mysqli_query($connect, $sql);
?>

<script>
    alert("댓글이 삭제되었습니다.");
    location.replace("view.php?number=<?=$number ?>");
</script>
