<?php
	$tk=$_GET['tk'];
	$mk=$_GET['mk'];
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	$query="SELECT id,rank FROM users where user like '$tk' AND pass like '$mk'";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$iduser=$row['id'];
		$rank=$row['rank'];
		$queryn="SELECT NOW() as a;";
		$resultn = mysqli_query($link,$queryn);
		$row = mysqli_fetch_assoc($resultn);
		$n= $row['a'];
		$query="INSERT INTO lichsu (id,congviec,thoigian) VALUES('$iduser','Đăng nhập','$n');";
		$result = mysqli_query($link,$query);
		if($rank==1){
			header("location:admin/m_index.php?id=".$iduser);
		}else{
			header("location:user/m_index.php?id=".$iduser);
		}
	}else{
		header("location:index.php?f=1");
	}
?>