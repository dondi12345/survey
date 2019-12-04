<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];
	$query="update chude SET pub ='1' where idchude ='$ic'";
	$result = mysqli_query($link,$query);
	header("location:chude.php?id=".$iduser);
?>