<?php
$connect = mysqli_connect("localhost", "root", "0000", "login") or die("fail");
session_start();
$id = $_SESSION['userid'];
$name = $_SESSION['user_name'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');

$tmpfile =  $_FILES['file']['tmp_name'];
$o_name = $_FILES['file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
$folder = "../".$filename;
move_uploaded_file($tmpfile,$folder);

$URL = 'list.php';                 
$query = "INSERT INTO board (no, title, content, date, views, id, name, file) 
values(null,'$title', '$content', '$date',0, '$id','$name', '$o_name')"; 
$result = mysqli_query($connect, $query);
if($result){
?>                  <script>
alert("<?php echo "글이 등록되었습니다."?>");
location.replace("<?php echo $URL?>");
</script>
<?php
}
else{
echo "FAIL";
}
mysqli_close($connect);
?>