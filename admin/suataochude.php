<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];	
?>

<?php
	$query="SELECT idchude,thongtin,more FROM chude where idchude=$ic";
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
	
	<div class="lthongke">
	<?php
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){ ?>
		<table>
			<form action="" method="post">
			<tr>

				<td><input type="text" class="scd" name="nhapcd" value="<?php echo $row['thongtin']; ?>"></td>
				<td><button class="vcd nonbutton" name="xncd"><a href="">
					<i class="far fa-check-circle"></i></i>
					</a>
					</button></td>
					<td><button class="vcd nonbutton" name="xoacd"><a class="xch" href="taochude.php?id=<?php echo $iduser ?>">
					<i class="far fa-trash-alt"></i>
					</a>
				</button></td>
			</tr>
			<tr>
				<td class="texttop"><span>Thông tin: </span>
				<input type="text" class="smore" name="nhaptt" value="<?php echo $row['more']; ?>"></td>
				<td><button class="vcd nonbutton" name="xncd"><a href="">
					<i class="far fa-check-circle"></i></i>
					</a>
					</button></td>
			</tr>
			</form>
			<?php
				if(isset($_POST["nhapcd"])){
					$nhap="";
					if(isset($_POST["nhapcd"])) {  $nhap=$_POST["nhapcd"]; }
					if($nhap!=""){
					$querych="UPDATE chude SET thongtin ='$nhap' WHERE idchude=$ic;";
					$resultch = mysqli_query($link,$querych);
					}
					header("location:suataochude.php?id=".$iduser."&ic=".$ic);
				}
				if(isset($_POST["xoacd"])){
					$queryxch="DELETE FROM cauhoi WHERE idchude='$ic';";
					$resultxch = mysqli_query($link,$queryxcd);
					$queryxcd="DELETE FROM chude WHERE idchude='$ic';";
					$resultxcd = mysqli_query($link,$queryxcd);						
					header("location:taochude.php?id=".$iduser);
				}
				function back(){
					header("location:taochude.php?id=".$iduser);
				}
				if(isset($_POST["nhaptt"])){
					$nhap="";
					if(isset($_POST["nhaptt"])) {  $nhap=$_POST["nhaptt"]; }
					if($nhap!=""){
					$querych="UPDATE chude SET more ='$nhap' WHERE idchude=$ic;";
					$resultch = mysqli_query($link,$querych);
					}
					header("location:suataochude.php?id=".$iduser."&ic=".$ic);
				}
			?>
	
		<?php }} ?>
	</div>
	
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>