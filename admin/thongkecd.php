<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];	
?>

<?php
	$query="SELECT idcauhoi,thongtin FROM cauhoi where idchude='$ic'";
	$result = mysqli_query($link,$query);
	
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
	
	<li class="muc">
		<a class="chude" href="chude.php?id=<?php echo $iduser ?>">
			<i class="fas fa-stream"></i>
			<span>Chủ đề</span>
        </a>
    </li>
	
	<li class="muc">
		<a class="chude" href="taochude.php?id=<?php echo $iduser ?>">
			<i class="fas fa-bars"></i>
			<span>Tạo chủ đề</span>
        </a>
    </li>
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Thống kê!   <i class="far fa-hand-point-down"></i></h1>
		
	</div>

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
										$query2="SELECT count(k.idtraloi) as `sl` FROM  ketqua k WHERE k.idtraloi=$traloi;";
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