<?php
	require_once(dirname(__FILE__).'/common/header-manager.php');
	include "koneksi.php";
	$query_mysql = mysql_query("SELECT * FROM feedback")or die(mysql_error());
	$nomor = 1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedback List</title>

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
                <h2>Feedback List</h2>           
                <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <table class="col-md-12 wow fadeInDown" border="1px">
                    	<tr bgcolor="#CCCCCC">
                    		<th><h5><b>No</b></h5></th>
                    		<th><h5><b>Nama</b></h5></th>
							<th><h5><b>Rate</b></h5></th>
							<th><h5><b>Komentar</b></h5></th>
						</tr>
                    <?php
						while($data = mysql_fetch_array($query_mysql)){
					?>

						<tr>
							<td align="center"><?php echo ("<h5>" . $nomor++ . "</h5>"); ?></td>
							<td><?php echo ("<h5>" . $data['nama'] . "</h5>"); ?></td>
							<td align="center"><?php echo ("<h5>" . $data['rate'] . "</h5>") ?></td>
							<td><?php echo ("<h5>" . $data['komentar'] . "</h5>") ?></td>
						</tr>
				  <?php } ?>
				  	</table>
                </div>
            </div>
            <a href="dashboard.php" class="btn btn-primary btn-lg">Back</a>
        </div>
    </div>
<?php
        require_once(dirname(__FILE__).'/common/footer.php');
?>