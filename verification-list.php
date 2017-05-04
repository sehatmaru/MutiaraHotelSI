<?php
	require_once(dirname(__FILE__).'/common/header-dashboard.php');
	include (dirname(__FILE__).'/common/koneksi.php');
	$query_payment = mysql_query("SELECT * FROM payment")or die(mysql_error());    //Retrieve payment
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment Verification List</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>        
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>  
  </head>
  <body>
    <div class="services">
        <div class="container">
            <div class="text-center">
                <h2>Payment Verification List</h2>           
                <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <table class="col-md-12 wow fadeInDown" border="1px">
                    	<tr bgcolor="#CCCCCC">
                    		<th width="80px"><h5><b>Order ID</b></h5></th>
							<th><h5><b>Room No</b></h5></th>
							<th><h5><b>Amount</b></h5></th>
                            <th><h5><b>Bukti</b></h5></th>
                            <th width="100px"><h5><b>Action</b></h5></th>
						</tr>
                    <?php
						while($data_payment = mysql_fetch_array($query_payment)){
                    ?>
						<tr>
							<td align="center"><?php echo ("<h5>" . $data_payment['orders_id'] . "</h5>"); ?></td>
							<td width="100px" align="center"><?php echo ("<h5>" . $data_payment['room_no'] . "</h5>") ?></td>
                            <td width="120px" align="center"><?php echo ("<h5>IDR " . $data_payment['amount'] . "</h5>") ?></td>
                            <td><?php echo ("<h5>" . $data_payment['bukti'] . "</h5>") ?></td>
                            <td width="170px"><?php echo '<a class="btn btn-primary" href="verify.php?id='.$data_payment['orders_id'].'">Verify</a>' ?>
                                <?php echo ' ';
                                      echo '<a class="btn btn-primary" href="hapus.php?id='.$data_payment['orders_id'].'">Delete</a>';
                                ?>
                            </td>
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