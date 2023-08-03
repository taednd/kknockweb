<?php
$connect = mysqli_connect('localhost', 'root', '0000', 'login') or die("connect failed");
$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d H:i:s');

$query = "UPDATE board set title='$title', content='$content', date='$date' where no = $number";
$result = mysqli_query($connect, $query);
if ($result) {
?>
    <script>
        alert("수정되었습니다.");
        location.replace("view.php?number=<?= $number ?>");
    </script>
<?php } else {
    echo "다시 시도해주세요.";
}
?>