<?php
	require_once(dirname(__FILE__).'/common/header-dashboard.php');
	include (dirname(__FILE__).'/common/koneksi.php');
	$query_studio   = mysqli_query($koneksi, "SELECT * FROM room WHERE room_type_id='1'");
	$query_superior = mysqli_query($koneksi, "SELECT * FROM room WHERE room_type_id='2'");
	$query_deluxe	= mysqli_query($koneksi, "SELECT * FROM room WHERE room_type_id='3'");
	$query_executive= mysqli_query($koneksi, "SELECT * FROM room WHERE room_type_id='4'");
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
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<h3>STUDIO</h3>
					<form action="edit-room.php" method="GET">
					<table class="table">
						<div class="form-group">
						<tr bgcolor="#F9F9F9">
							<th><h5>Room No</h5></th>
							<th><h5>Keterangan</h5></th>
							<th><h5>Action</h5></th>
						</tr>
					<?php while($studio = mysqli_fetch_array($query_studio)){
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $studio['room_no'] . "</h5>"); ?></td>
							<td align="center"><?php echo("<h5>" . $studio['keterangan'] . "</h5>") ?></td>
							<?php echo "<td align='center'><a class='btn btn-primary' href=edit-room.php?id=".$studio['room_no'].">Edit</a></td>"; ?>
						</tr>
				  <?php } ?>
					</table>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
					<h3>SUPERIOR</h3>
					<table class="table">
						<div class="form-group">
						<tr bgcolor="#F9F9F9">
							<th><h5>Room No</h5></th>
							<th><h5>Keterangan</h5></th>
							<th><h5>Action</h5></th>
						</tr>
					<?php while($superior = mysqli_fetch_array($query_superior)){
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $superior['room_no'] . "</h5>"); ?></td>
							<td align="center"><?php echo("<h5>" . $superior['keterangan'] . "</h5>") ?></td>
							<?php echo "<td align='center'><a class='btn btn-primary' href=edit-room.php?id=".$superior['room_no'].">Edit</a></td>"; ?>
						</tr>
				  <?php } ?>
					</table>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
					<h3>DELUXE</h3>
					<table class="table">
						<div class="form-group">
						<tr bgcolor="#F9F9F9">
							<th><h5>Room No</h5></th>
							<th><h5>Keterangan</h5></th>
							<th><h5>Action</h5></th>
						</tr>
					<?php while($deluxe = mysqli_fetch_array($query_deluxe)){
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $deluxe['room_no'] . "</h5>"); ?></td>
							<td align="center"><?php echo("<h5>" . $deluxe['keterangan'] . "</h5>") ?></td>
							<?php echo "<td align='center'><a class='btn btn-primary' href=edit-room.php?id=".$deluxe['room_no'].">Edit</a></td>"; ?>
						</tr>
				  <?php } ?>
					</table>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
					<h3>EXECUTIVE</h3>
					<table class="table">
						<div class="form-group">
						<tr bgcolor="#F9F9F9">
							<th><h5>Room No</h5></th>
							<th><h5>Keterangan</h5></th>
							<th><h5>Action</h5></th>
						</tr>
					<?php while($executive = mysqli_fetch_array($query_executive)){
					?>
						<tr>
							<td><?php echo ("<h5>Kamar " . $executive['room_no'] . "</h5>"); ?></td>
							<td align="center"><?php echo("<h5>" . $executive['keterangan'] . "</h5>") ?></td>
							<?php echo "<td align='center'><a class='btn btn-primary' href=edit-room.php?id=".$executive['room_no'].">Edit</a></td>"; ?>
						</tr>
				  <?php } ?>
					</table>
				</div>
			</div>
		</div>
		</form>
	</div>
	<?php
		require_once(dirname(__FILE__).'/common/footer.php');
	?>