<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('s_top.php');
	$iduser=$_GET['id'];
	$idloai="";
	
?>
<?php
	$query="SELECT idcauhoi,thongtin FROM cauhoi";
	$result = mysqli_query($link,$query);
	$query1="SELECT * FROM diadiem";
	$result1 = mysqli_query($link,$query1);
?>
<div class="chon">
	<form action="" class="ftraloi" method="post">
		<input type="hidden" name="iduser" value="<?php $iduser; ?>">
		<input type="hidden" name="idloai" value="<?php $idloai; ?>">
		<p class="cauhoi">Chọn nơi bạn muốn khảo sát<p>
		<select name="thanhpho">
		<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result1)){ ?>
					<option value="<?php echo $row['id'];?>"> <?php echo $row['thongtin'];?></option>
					<?php
				}
			}?>	
		</select>

		<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<p class = "cauhoi"><?php echo $row['thongtin']; ?></p>
					<?php
						$da=$row['idcauhoi'];
						$query1="SELECT thongtin,idtraloi FROM traloi where idcauhoi=$da";
						$result1 = mysqli_query($link,$query1);
						while($row1 = mysqli_fetch_assoc($result1)){ ?>
							<input type="radio" name="<?php echo $da; ?>" value="<?php echo $row1['idtraloi']; ?>">
							<label class = "dapan"><span></span><?php echo $row1['thongtin']; ?></label><br>
							<?php
						}
				}
			}?>
		<input type="submit" name="xacnhan" value="Xác Nhận">
	</form>

	
</div>
<?php
	$iddiadiem=$_POST["thanhpho"];
	$query="SELECT idcauhoi,thongtin FROM cauhoi";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$da=$row['idcauhoi'];
			if(isset($_REQUEST[$da])){
				echo $_REQUEST[$da];
				$query2="INSERT INTO ketqua (id,iddiadiem,idtraloi) VALUES ($iduser,$iddiadiem,$_REQUEST[$da]);";
				$result2 = mysqli_query($link,$query2);
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





























