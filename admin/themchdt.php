<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];	
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
		<a class="chude light" href="taochude.php?id=<?php echo $iduser ?>">
			<i class="fas fa-bars"></i>
			<span>Tạo chủ đề</span>
        </a>
    </li>
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Tạo câu hỏi!   <i class="fas fa-edit"></i></h1>
		
	</div>
	<div class="lthongke">
		<form action="" method="post">
			<table>
			<tr>
				<td>Chọn kiểu câu hỏi:<td>
				<td><select name="loai">
					<option value="1">1 lựa chọn</option>
        			<option value="2">Nhiều lựa chọn</option>
					<option value="3">Nhập nội dung</option>
				</select></td>
				<td><input type="submit" name="xn" value="Xác nhận" >
			<tr>
			
			</table>
		</form>
		<?php if(isset($_POST['xn'])){
			echo $_POST['loai'];
			header("location:themtraloidt".$_POST['loai'].".php?id=".$iduser."&ic=".$ic);
		}
		?>
	</div>
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>