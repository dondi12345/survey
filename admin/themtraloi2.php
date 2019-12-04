<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];
	$sl=0;
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
		<h1>Tạo câu hỏi!   <i class="fas fa-edit"></i></h1>
		
	</div>
	<div class="lthongke">
		<form action="" method="post">
				<table>
					<tr>
						<td>Nhập số lượng câu trả lời:<td>
						<td><input type="text" class="nhapsl" size="2" name="sl" value=""></td>
						<td><input type="submit" name="sltl" value="Xác nhận" >
					<tr>
				</table>
				<?php 
				if(isset($_POST['sltl'])){
					if(isset($_POST['sl'])){
					$sl=$_POST['sl'];
					}else{
					$sl=0;
					}
					?>
					
					<table>
						<tr>
							<td>Nhập câu hỏi:<td>
							<td><input type="text" class="sch" name="nhapch" value=""></td>
						<tr>
					</table>
					<table class ="traloi">
						<?php for($i = 0; $i <$sl ; $i++){?>
							<tr>
								<td><input type="checkbox" name="stl" value="<?php echo $row1['idtraloi']; ?>"></td>
								<td><input type="text" name="<?php echo $i; ?>" value=""></td>
							</tr>
						<?php }?>
					</table>
				<?php }?>
				<?php if($sl>=1){ ?>
			<button class="nonbutton themch" name="xacnhan">
				<a class="isua" href="">
				<i class="fas fa-plus-square"></i>
				<span>Thêm</span>
				</a>
			</button>
			<?php } ?>
		</form>
		<?php
			if(isset($_POST['xacnhan'])){
				if(isset($_POST['nhapch'])||$_POST['nhapch']!=""){
					$getch=$_POST['nhapch'];
					$querych="INSERT INTO cauhoi (thongtin,idloai,idchude) VALUES ('$getch','2','$ic');";
					$resultch = mysqli_query($link,$querych);

					$queryidch="SELECT idcauhoi FROM cauhoi where thongtin like '$getch' and idchude like '$ic';";
					$resultidch = mysqli_query($link,$queryidch);
					$rs = mysqli_fetch_assoc($resultidch);
					$idch=$rs['idcauhoi'];
					for($i=0;$i<100;$i++){
						if(isset($_POST[''.$i.''])){
							$gettl=$_POST[''.$i.''];
							$querytl="INSERT INTO traloi (thongtin,idcauhoi) VALUES ('$gettl','$idch');";
							$resulttl = mysqli_query($link,$querytl);
						}
					}
				}
				header("location:cauhoi.php?id=".$iduser."&ic=".$ic);
			}
		?>
	</div>
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>