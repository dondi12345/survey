<?php
	ob_start();
?>

<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];
	$ic=$_GET['ic'];
?>

<?php
	$query="SELECT idcauhoi,thongtin FROM cauhoi where idcauhoi=$ic";
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
		<a class="lichsu light" href="cauhoi.php?id=<?php echo $iduser ?>">
			<i class="far fa-question-circle"></i>
			<span>Câu hỏi</span>
        </a>
    </li>
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Câu hỏi!   <i class="fas fa-edit"></i></h1>
		
	</div>
	<form action=""  method="post">

	<div class="lthongke">
	<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<table>
					<tr>
						<form action="" method="post">
							<td><input type="text" class="sch" name="nhapch" value="<?php echo $row['thongtin']; ?>"></td>
							<td><button class="vch nonbutton" name="xnch"><a href="">
								<i class="far fa-check-circle"></i></i>
								</a>
							</button></td>
							<td><button class="vch nonbutton" name="xoach"><a class="xch" href="">
										<i class="far fa-trash-alt"></i>
										</a>
									</button></td>
							<?php
								if(isset($_POST["xnch"])){
										$nhap="";
										if(isset($_POST["nhapch"])) {  $nhap=$_POST["nhapch"]; }
										if($nhap!=""){
										$querych="UPDATE cauhoi SET thongtin ='$nhap' WHERE idcauhoi=$ic;";
										$resultch = mysqli_query($link,$querych);
										}
										header("location:suach.php?id=".$iduser."&ic=".$ic);
								}
								if(isset($_POST["xoach"])){
										$queryxtl="DELETE FROM  traloi WHERE idcauhoi='$ic';";
										$queryxch="DELETE FROM  cauhoi WHERE idcauhoi='$ic';";
										$resultxtl = mysqli_query($link,$queryxtl);
										$resultxch = mysqli_query($link,$queryxch);							
										header("location:cauhoi.php?id=".$iduser);
								}
							?>
						</form>
					<tr>
					</table>
					<?php
						$da=$ic;
						$query1="SELECT thongtin,idtraloi FROM traloi where idcauhoi=$da";
						$result1 = mysqli_query($link,$query1);?>
						<table class="ldapan">
						<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
							<tr>
								<form action="" method="post">
									<td><input type="radio" name="stl" value="<?php echo $row1['idtraloi']; ?>"></td>
									<td><input type="text" name="<?php echo $da; ?>" value="<?php echo $row1['thongtin']; ?>"></td>
									<td><a class="xtl" href="xoatl.php?id=<?php echo $iduser?>&i=<?php echo $row1['idtraloi'];?>">
										<i class="far fa-trash-alt"></i>
										</a>
									</td>
								
								</form>
							</tr>
							<?php
	
								
						}?>
							<tr>
								<form action="" method="post">
								<td><input type="radio" name="<?php echo $ic; ?>" value="<?php echo $row1['idtraloi']; ?>"></td>
								<td><input type="text" name="nhaptl" value=""></td>
								<td>
									<button class="themtl" name="themtl">
										<a class="" href="#">
											<i class="fas fa-plus-circle"></i>
										</a>
									</button>
									
								</td>
								</form>
								<?php
									if(isset($_POST["themtl"])){
										$nhap="";
										if(isset($_POST["nhaptl"])) {  $nhap=$_POST["nhaptl"]; }
										if($nhap!=""){
										$query2="INSERT INTO traloi (thongtin,idcauhoi) VALUES ('$nhap',$ic);";
										$result2 = mysqli_query($link,$query2);
										}
										header("location:suach.php?id=".$iduser."&ic=".$ic);
										ob_enf__flush();
									}					
									
								?>
							</tr>
						</table> <?php
				}
	}?>
	
	</form>
	
	
	
	
</div>

<?php

?>

<?php
	include('m_bottom.php');
?>