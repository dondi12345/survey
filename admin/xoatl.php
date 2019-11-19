<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	$iduser=$_GET['id'];	
	$i=$_GET['i'];
	$query="SELECT idcauhoi FROM traloi where idtraloi=$i";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($result);
	$ic=$row['idcauhoi'];
	$queryx="DELETE FROM traloi where idtraloi=$i";
	$resultx = mysqli_query($link,$queryx);
	header("location:suach.php?id=".$iduser."&ic=".$ic);
?>