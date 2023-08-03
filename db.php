<?php
$connect = mysqli_connect('localhost','root','0000','login');

if(!$connect){
    echo"연동실패";
}
$db = new mysqli("localhost","root","0000","login"); 
	$db->set_charset("utf8");

	function query($query)
	{
		global $db;
		return $db->query($query);
	}
?>