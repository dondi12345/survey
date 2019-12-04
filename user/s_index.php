<?php
	$link = new mysqli('localhost','root','','moitruong') or die('ket noi that bai!');
	mysqli_query($link,'SET NAMES UTF8');
	include('s_top.php');
	$iduser=$_GET['id'];
	
?>
<?php
	$query="SELECT idchude,thongtin,more FROM chude Where pub = 1 group by idchude DESC";
	$result = mysqli_query($link,$query);
	
?>
<div class="chon">
	<h1>Chọn chủ đề</h1>
		<form action=""  method="post">

	<div class="lthongke">
	<?php
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){ ?>
					<table>
					<tr>
						<td><a class="" href="s_khaosat.php?id=<?php echo $iduser ?>&ic=<?php echo $row['idchude']; ?>">
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
	include('s_bottom.php');
?>





























