<?php
$connect = mysqli_connect('localhost', 'root', '0000', 'login') or die("connect failed");
$number = $_GET['number'];

session_start();

$URL = "list.php";
$query = "DELETE from board where no = $number";
$result = mysqli_query($connect, $query);
?>

<script>
    alert("게시글이 삭제되었습니다.");
    location.replace("<?php echo $URL ?>");
</script>
