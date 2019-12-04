<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('s_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];
	
?>
<?php
	$query="SELECT idcauhoi,thongtin,idloai FROM cauhoi where idchude='$ic'";
	$result = mysqli_query($link,$query);
	$query1="SELECT thongtin FROM chude where idchude='$ic'";
	$result1 = mysqli_query($link,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$chude = $row1['thongtin'];
?>
<div class="chon">
	<form action="" class="ftraloi" method="post">
		<h1><?php echo $chude; ?></h1>
		<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<p class = "cauhoi"><?php echo $row['thongtin']; ?></p>
					<?php
						$da=$row['idcauhoi'];
						$idloai=$row['idloai'];
						$query1="SELECT thongtin,idtraloi FROM traloi where idcauhoi=$da";
						$result1 = mysqli_query($link,$query1);
						while($row1 = mysqli_fetch_assoc($result1)){ ?>
							<input type="<?php if($idloai==1) {echo "radio";}
									else if($idloai==2){echo "checkbox";} else if($idloai==3){echo "text";}?>" name="<?php if($idloai!=2) { echo $da;}
									else if($idloai==2){ echo $da."[]";}?>" value="<?php if($idloai!=3){echo $row1['idtraloi'];} ?>">
							<label class = "dapan"><span></span><?php if($idloai!=3){echo $row1['thongtin'];} ?></label><br>
							<?php
						}
				}
			}?>
		<input type="submit" name="xacnhan" value="Xác Nhận">
	</form>

	
</div>
<?php
	$query="SELECT idcauhoi,thongtin FROM cauhoi where idchude =$ic and idloai='1';";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$da=$row['idcauhoi'];
			if(isset($_REQUEST[$da])){
				echo $_REQUEST[$da];
				$query2="INSERT INTO ketqua (id,idtraloi) VALUES ($iduser,$_REQUEST[$da]);";
				$result2 = mysqli_query($link,$query2);
			}else{		
			}
		}	
	}
	$query="SELECT idcauhoi,thongtin FROM cauhoi where idchude =$ic and idloai='2';";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$da=$row['idcauhoi'];
			if(isset($_POST[$da])){
				foreach($_POST[$da] as $value) {
					$query3="INSERT INTO ketqua (id,idtraloi) VALUES ($iduser,$value);";
					$result3 = mysqli_query($link,$query3);
				}
			}else{		
			}
		}	
	}
	$query="SELECT idcauhoi,thongtin FROM cauhoi where idchude =$ic and idloai='3';";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$da=$row['idcauhoi'];
			$queryt="SELECT idtraloi FROM traloi where idcauhoi = $da;";
			$resultt = mysqli_query($link,$queryt);
			$rowt = mysqli_fetch_assoc($resultt);
			$tl=$rowt['idtraloi'];
			echo "INSERT INTO ketqua (id,idtraloi,thongtin) VALUES ($iduser,$tl,'$_POST[$da]');";
			if(isset($_POST[$da])){
				$query4="INSERT INTO ketqua (id,idtraloi,thongtin) VALUES ($iduser,$tl,'$_POST[$da]');";
				$result4 = mysqli_query($link,$query4);
			}else{		
			}
		}	
	}
	
	if(isset($_POST["xacnhan"])){
		$queryn="SELECT NOW() as a;";
		$resultn = mysqli_query($link,$queryn);
		$row = mysqli_fetch_assoc($resultn);
		$n= $row['a'];
		$query="INSERT INTO lichsu (id,congviec,thoigian) VALUES('$iduser','Khảo sát','$n');";
		$result = mysqli_query($link,$query);
		header('location:m_index.php?id='.$iduser);
	}
?>


<?php
	include('s_bottom.php');
?>