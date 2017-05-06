<?php
	require_once(dirname(__FILE__).'/common/header-dashboard.php');
	include (dirname(__FILE__).'/common/koneksi.php');
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
                    <table class="col-md-12 wow fadeInDown table table-striped">
                    	<tr>
                    		<th width="10px"><h5><b>No</b></h5></th>
                    		<th width="350px"><h5><b>Nama</b></h5></th>
							<th width="10px"><h5><b>Rate</b></h5></th>
							<th><h5><b>Komentar</b></h5></th>
						</tr>
                    <?php
						while($data = mysql_fetch_array($query_mysql)){
					?>
						<tr>
							<td width="10px" align="center"><?php echo ("<h5>" . $nomor++ . "</h5>"); ?></td>
							<td width="10px" align="center"><?php echo ("<h5>" . $data['name'] . "</h5>"); ?></td>
							<td width="10px" align="center"><?php echo ("<h5>" . $data['rate'] . "</h5>") ?></td>
							<td width="700px" align="center"><?php echo ("<h5>" . $data['comment'] . "</h5>") ?></td>
						</tr>
				  <?php } ?>
				  	</table>
                </div>
            </div>
        </div>
    </div>
<?php
        require_once(dirname(__FILE__).'/common/footer.php');
?>