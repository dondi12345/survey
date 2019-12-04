<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];	
?>
<?php
	$query="SELECT * FROM users where id=$iduser";
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($result);
	
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
		<a class="trangcanhan light" href="m_index.php?id=<?php echo $iduser ?>">
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
		<a class="chude" href="taochude.php?id=<?php echo $iduser ?>">
			<i class="fas fa-bars"></i>
			<span>Tạo chủ đề</span>
        </a>
    </li>
	
</ul>


<div class="index">
	<div class="daidien">
		<img src="images/clone.jpg" class="avatar" alt="Hình đại diện" />
		<div class="ten">
		<h1><?php echo $row['ten']?></h1>
		<a href="sua.php?id=<?php echo $iduser ?>"><i class="fas fa-user-edit"></i></a>
		</div>
	</div>
	
	<table class="thontincn">
	
		<tr>
			<td><b>Giới tính:</b></td>
			<td><?php echo $row['gioitinh']?></td>
		</tr>
		<tr>
			<td><b>Tuổi:</b></td>
			<td><?php echo $row['tuoi']?></td>
		</tr>
		<tr>
			<td><b>Ngày sinh:</b></td>
			<td><?php echo $row['sinh']?></td>
		</tr>
		<tr>
			<td><b>Email:</b></td>
			<td><?php echo $row['email']?></td>
		</tr>
		<tr>
			<td><b>Địa chỉ:</b></td>
			<td><?php echo $row['diachi']?></td>
		</tr>
	</table>
	
</div>






<?php
	include('m_bottom.php');
?>