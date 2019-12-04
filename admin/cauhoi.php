<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];
?>

<?php
	$query="SELECT idcauhoi,thongtin,idloai FROM cauhoi where idchude='$ic'";
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
		<a class="thongke" href="thongke.php?id=<?php echo $iduser ?>">
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
		<a class="chude light" href="chude.php?id=<?php echo $iduser ?>">
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
		<h1>Câu hỏi!   <i class="fas fa-edit"></i></h1>
		
	</div>
	<div class="them">
			<a class="isua" href="themch.php?id=<?php echo $iduser ?>&ic=<?php echo $ic ?>">
			<i class="fas fa-plus-square"></i>
			<span>Thêm</span>
			</a>
		</div>
	<div class="lthongke">
	<form action=""  method="post">

	
	<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<table>
					<tr>
						<td><p class = "cauhoi"><?php echo $row['thongtin']; ?></p></td>
						<td><a class="lichsu light" href="suach.php?id=<?php echo $iduser ?>&ic=<?php echo $ic; ?>&ih=<?php echo $row['idcauhoi']; ?>">
						<i class="fas fa-edit"></i></h1>
						</a></td>
					<tr>
					</table>
					<?php
						$da=$row['idcauhoi'];
						$idloai=$row['idloai'];
						$query1="SELECT thongtin,idtraloi FROM traloi where idcauhoi=$da";
						$result1 = mysqli_query($link,$query1);?>
						<table class="ldapan">
						<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
							<tr>
								<td><input type="<?php if($idloai==1) {echo "radio";}
									else if($idloai==2){echo "checkbox";} else if($idloai==3){echo "text";}?>" name="<?php echo $da; ?>" value="<?php if($idloai!=3){echo $row1['idtraloi'];} ?>"></td>
								<td><?php if($idloai!=3){echo $row1['thongtin'];} ?></td>
							</tr>
							<?php 	
							
						}?>
						</table> <?php
				}
	}?>
	
	</form>
	</div>
		
	
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>