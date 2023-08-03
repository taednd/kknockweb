<?php
$connect = mysqli_connect('localhost', 'root', '0000', 'login') or die("connect failed");
$rno = $_POST['rno'];
$number = $_POST['bno'];

$sql ="select * from comment where no='".$rno."'";
$sql ="update comment set where no='".$rno."'"; 
$result = mysqli_query($connect, $sql);

$query = "UPDATE comment set content='".$_POST['content']."' where no ='".$rno."'";
$result = mysqli_query($connect, $query);
?>
<script type="text/javascript">alert('수정되었습니다.');
location.replace("view.php?number=<?php echo $bno; ?>");
</script>
