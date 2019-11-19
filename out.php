<?php
	$iduser=$_GET['id'];
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	$queryn="SELECT NOW() as a;";
	$resultn = mysqli_query($link,$queryn);
	$row = mysqli_fetch_assoc($resultn);
	$n= $row['a'];
	echo $n;
	$query="INSERT INTO lichsu (id,congviec,thoigian) VALUES('$iduser','Đăng xuất','$n');";
	$result = mysqli_query($link,$query);
	header("location:index.php");
?>