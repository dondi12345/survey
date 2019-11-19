<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('m_top.php');
	$iduser=$_GET['id'];	
?>

<?php
	$query="SELECT thoigian,congviec FROM lichsu where id=$iduser order by thoigian DESC";
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
		<a class="lichsu light" href="lichsu.php?id=<?php echo $iduser ?>">
			<i class="fas fa-history"></i>
			<span>Lich sử</span>
        </a>
    </li>
	
</ul>

<div class="index">
	<div class="tieude">
		<h1>Lịch sử làm việc !    <i class="fas fa-history"></i></h1>
		
	</div>
	
	<div class="llichsu">
		<table class="listls">
			<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<tr>
						<td><?php echo $row['thoigian'];?> : </td>
						<td><?php echo $row['congviec'];?></td>
					</tr>
					
					<?php
				}
			}?>	
	
		</table>
	</div>






</div>






<?php
	include('m_bottom.php');
?>