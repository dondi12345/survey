<?php
	$tk=$_GET['tk'];
	$mk=$_GET['mk'];
	$rmk=$_GET['rmk'];
	$loi=0;
	if($rmk!=$mk){
		$loi=1;
		header("location:dangky.php?f=2");
	}
	if(strlen($mk)<6){
		$loi=1;
		header("location:dangky.php?f=4");
	}
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	$query="SELECT user FROM users where user like '$tk';";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		$loi=1;
		header("location:dangky.php?f=3");
	}
	if($loi==0){
	$query="INSERT INTO users (user,pass,ten,tuoi,sinh,email,diachi,gioitinh,rank) VALUES ('$tk','$mk','ten','tuoi','sinh','email','diachi','gioitinh','0');";
	$result = mysqli_query($link,$query);
	header("location:dangky.php?f=1");}
	
	
?>