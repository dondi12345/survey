<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];	
?>

<?php
	$query="SELECT idchude,thongtin,more FROM chude where pub=0 group by idchude DESC";
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
		<a class="chude" href="chude.php?id=<?php echo $iduser ?>">
			<i class="fas fa-stream"></i>
			<span>Chủ đề</span>
        </a>
    </li>
	
	<li class="muc">
		<a class="taochude light" href="taochude.php?id=<?php echo $iduser ?>">
			<i class="fas fa-bars"></i>
			<span>Tạo chủ đề</span>
        </a>
    </li>
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Chủ đề đang tạo!   <i class="fas fa-edit"></i></h1>
		
	</div>
	<form action="" method="post">
	<div class="themcd">
	
	<table>
			
			<tr>

				<td><input type="text" class="scd" name="nhapcd" value=""></td>
				
			</tr>
			<tr>
				<td class="texttop"><span>Thông tin: </span>
				<input type="text" class="smore" name="nhaptt" value=""></td>
				
			</tr>	
	</table>
	
	</div>
		<table class="thontincn">
			<tr>
			<td class="fsua huy">
				<a class="isua" href="taochude.php?id=<?php echo $iduser ?>">
				<i class="fas fa-window-close"></i>
				<span>Hủy bỏ</span>
				</a>
			</td>
			<td class="fsua">
				<button class="xacnhan">
					<a class="isua" href="taochude.php?id=<?php echo $iduser ?>">
					<i class="fas fa-check-square"></i>
					<span>Xác Nhận</span>
					</a>
				</button>
				
			</td>     
		</tr>
		</table>
		</form>
		<?php
				if(isset($_POST["nhapcd"])){
					$nhapcd="";
					$nhaptt="";
					if(isset($_POST["nhapcd"])) {  $nhapcd=$_POST["nhapcd"]; }
					if(isset($_POST["nhaptt"])) {  $nhaptt=$_POST["nhaptt"]; }
					if($nhapcd!=""){
					$querych="INSERT INTO chude (`thongtin`,`more`,`pub`) VALUES ('$nhapcd','$nhaptt',0);";
					$resultch = mysqli_query($link,$querych);
					}
					header("location:taochude.php?id=".$iduser);
				}
			?>
	
	
<?php

?>

<?php
	include('m_bottom.php');
?>