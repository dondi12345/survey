<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];	
?>

<?php
	$query="SELECT idchude,thongtin,more,pub FROM chude where pub='1' group by idchude DESC";
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
	
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Thống kê!   <i class="far fa-hand-point-down"></i></h1>
		
	</div>
	<form action=""  method="post">

	<div class="lthongke">
	<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<table>
					<tr>
						<td><a class="" href="thongkecd.php?id=<?php echo $iduser ?>&ic=<?php echo $row['idchude']; ?>">
							<i class="fas fa-arrow-right"></i>
							<span><?php echo $row['thongtin']; ?></span>
						</a>
						<p class="more"><?php echo $row['more']; ?></td>
					</tr>
					</table>
					 <?php
				}
	}?>
	</form>
	
	
	
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>