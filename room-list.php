<?php
	require_once(dirname(__FILE__).'/common/header-dashboard.php');
	include (dirname(__FILE__).'/common/koneksi.php');
	$query_studio   = mysql_query("SELECT * FROM room WHERE room_type_id='1'")or die(mysql_error());
	$query_superior = mysql_query("SELECT * FROM room WHERE room_type_id='2'")or die(mysql_error());
	$query_deluxe	= mysql_query("SELECT * FROM room WHERE room_type_id='3'")or die(mysql_error());
	$query_exe 		= mysql_query("SELECT * FROM room WHERE room_type_id='4'")or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Room</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script>wow = new WOW({}).init();</script>
</head>
<body>
  	<div class="services">
		<div class="container">
			<div class="text-center">
				<h2><i class="fa fa-cog fa" style="font-size: 40px; color: #111111;">&nbsp;</i>ROOM LIST</h2>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<h3>STUDIO</h3>
					<table class="table">
						<form action="manage-process.php" method="POST">
						<div class="form-group">
					<?php while($studio = mysql_fetch_array($query_studio)){
						$studio_no = 0;
						$studio_no++;
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $studio['room_no'] . "</h5>"); ?></td>
							<td>
								<select class="form-control" name="studio">
								<?php 
									if ($studio['keterangan']=='Terisi') {
								?>
									<option value="Terisi"><h5><?php echo($studio['keterangan']) ?></h5></option>
									<option value="Kosong">Kosong</option>
								<?php
									}else{
								?>
									<option value="Kosong"><h5><?php echo($studio['keterangan']) ?></h5></option>
									<option value="Terisi">Terisi</option>
								<?php
									}
								?>
							</td>
						</tr>
				  <?php } ?>
					</table>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
					<h3>SUPERIOR</h3>
					<table class="table">
						<div class="form-group">
					<?php while($superior = mysql_fetch_array($query_superior)){
						$superior_no = 0;
						$superior_no++;
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $superior['room_no'] . "</h5>"); ?></td>
							<td>
								<select class="form-control" name="<?php $superior_no ?>">
								<?php 
									if ($superior['keterangan']=='Terisi') {
								?>
									<option value="Terisi"><h5><?php echo($superior['keterangan']) ?></h5></option>
									<option value="Kosong">Kosong</option>
								<?php
									}else{
								?>
									<option value="Kosong"><h5><?php echo($superior['keterangan']) ?></h5></option>
									<option value="Terisi">Terisi</option>
								<?php
									}
								?>
							</td>
						</tr>
				  <?php } ?>
					</table>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
					<h3>DELUXE</h3>
					<table class="table">
						<div class="form-group">
					<?php while($deluxe = mysql_fetch_array($query_deluxe)){
						$deluxe_no = 0;
						$deluxe_no++;
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $deluxe['room_no'] . "</h5>"); ?></td>
							<td>
								<select class="form-control" name="<?php $deluxe_no ?>">
								<?php 
									if ($deluxe['keterangan']=='Terisi') {
								?>
									<option value="Terisi"><h5><?php echo($deluxe['keterangan']) ?></h5></option>
									<option value="Kosong">Kosong</option>
								<?php
									}else{
								?>
									<option value="Kosong"><h5><?php echo($deluxe['keterangan']) ?></h5></option>
									<option value="Terisi">Terisi</option>
								<?php
									}
								?>
							</td>
						</tr>
				  <?php } ?>
						</table>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
					<h3>EXECUTIVE</h3>
					<table class="table">
						<div class="form-group">
					<?php while($exe = mysql_fetch_array($query_exe)){
						$exe_no	= 0;
						$exe_no++;
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $exe['room_no'] . "</h5>"); ?></td>
							<td>
								<select class="form-control" name="<?php $exe_no ?>">
								<?php 
									if ($exe['keterangan']=='Terisi') {
								?>
									<option value="Terisi"><h5><?php echo($exe['keterangan']) ?></h5></option>
									<option value="Kosong">Kosong</option>
								<?php
									}else{
								?>
									<option value="Kosong"><h5><?php echo($exe['keterangan']) ?></h5></option>
									<option value="Terisi">Terisi</option>
								<?php
									}
								?>
							</td>
							<td
						</tr>
				  <?php } ?>
					</table>
				</div>
			</div>
		</div>
			<div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required>Update</button></div>
		</form>
	</div>
	<?php
		require_once(dirname(__FILE__).'/common/footer.php');
	?>