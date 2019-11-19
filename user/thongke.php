<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];	
?>

<?php
	$query="SELECT idcauhoi,thongtin FROM cauhoi";
	$result = mysqli_query($link,$query);
	$query1="SELECT * FROM diadiem";
	$result1 = mysqli_query($link,$query1);
	
?>
<?php
	$queryt="SELECT * FROM users where id=$iduser";
	$resultt = mysqli_query($link,$queryt);
	$rowt = mysqli_fetch_assoc($resultt);
	
?>
<body>
	<header>
		<a class="logo" href="m_index.php">WELCOME</a>
		<div id="canhan">
			<span><?php echo $rowt['user']?></span>
			<a class="logout" href="../out.php?id=<?php echo $iduser?>">Logout</a>
		</div>
	</header>

<ul class="thanhben">
	<li class="muc">
		<a class="trangcanhan" href="m_index.php?id=<?php echo $iduser ?>">
			<i class="far fa-address-card"></i>
			<span>Trang cá nhân</span>
        </a>
    </li>
	
	<li class="muc">
		<a class="khaosat" href="s_index.php?id=<?php echo $iduser ?>">
			<i class="far fa-check-circle"></i>
			<span>Khảo sát</span>
        </a>
    </li>
	
	<li class="muc">
		<a class="thongke light" href="thongke.php?id=<?php echo $iduser ?>">
			<i class="fas fa-chart-line"></i>
			<span>Thống kê</span>
        </a>
    </li>
	
	<li class="muc">
		<a class="lichsu" href="lichsu.php?id=<?php echo $iduser ?>">
			<i class="fas fa-history"></i>
			<span>Lich sử</span>
        </a>
    </li>
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Thống kê!   <i class="far fa-hand-point-down"></i></h1>
		
	</div>
	<form action="" class="danhsach"  method="post">
		<h3>Chọn nơi bạn muốn xem !</h3>
		<select name="thanhpho">
		<?php
			if(mysqli_num_rows($result1)>0){
				while($row = mysqli_fetch_assoc($result1)){ ?>
					<option value="<?php echo $row['id'];?>"> <?php echo $row['thongtin'];?></option>
					<?php
				}
			}?>	
		</select>
		<button name ="xacnhan" type="submit" >Xác nhận</button>
	<?php
		if(isset($_POST["xacnhan"])){
			$iddiadiem=$_POST["thanhpho"];
		}else{
			$iddiadiem=1;
		}
		
	?>
	
	</form>
	<div class="lthongke">
	<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<p class = "cauhoi"><?php echo $row['thongtin']; ?></p>
					<?php
						$da=$row['idcauhoi'];
						$query1="SELECT thongtin,idtraloi FROM traloi where idcauhoi=$da";
						$result1 = mysqli_query($link,$query1);?>
						<table class="ldapan">
						<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
							<tr>
								<td><?php echo $row1['thongtin']; ?></td>
								<td> 
									<?php
										$traloi=$row1['idtraloi'];
										$query2="SELECT count(k.idtraloi) as `sl` FROM diadiem d INNER JOIN ketqua k ON d.id = k.iddiadiem WHERE d.id= $iddiadiem AND k.idtraloi=$traloi;";
										$result2 = mysqli_query($link,$query2);
										$row2 = mysqli_fetch_assoc($result2);
										echo $row2['sl'];
									?>
								</td>
							
							</tr>
							<?php
						}?>
						</table> <?php
				}
	}?>
	</div>
	
	
	
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>