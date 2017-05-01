<?php
	require_once(dirname(__FILE__).'/common/header-dashboard.php');
	include "koneksi.php";
	$query_order       = mysql_query("SELECT * FROM pesanan")or die(mysql_error());    //Retrieve tada pesanan
    $query_customer    = mysql_query("SELECT * FROM customer")or die(mysql_error());    //Retrieve data pelanggan
	$nomor = 1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order List</title>

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
                <h2>Order List</h2>           
                <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <table class="col-md-12 wow fadeInDown" border="1px">
                    	<tr bgcolor="#CCCCCC">
                    		<th><h5><b>No</b></h5></th>
                    		<th><h5><b>ID</b></h5></th>
							<th><h5><b>Email</b></h5></th>
							<th><h5><b>Telepon</b></h5></th>
                            <th><h5><b>Status</b></h5></th>
							<th><h5><b>Check In</b></h5></th>
							<th><h5><b>Check Out</b></h5></th>
                            <th><h5><b>Tipe Kamar</b></h5></th>
                            <th><h5><b>KTP</b></h5></th>
						</tr>
                    <?php
						while(($data_order = mysql_fetch_array($query_order)) && ($data_customer = mysql_fetch_array($query_customer))){

                            //----START DAY COUNT----//
                            $start_date = new DateTime($data_order['check_in']);
                            $end_date   = new DateTime($data_order['check_out']);
                            $interval   = $start_date->diff($end_date);
                            $count      = $interval->days;
                            //----END DAY COUNT----//
                    ?>
						<tr>
							<td align="center"><?php echo ("<h5>" . $nomor++ . "</h5>"); ?></td>
							<td><?php echo ("<h5>" . $data_customer['name'] . "</h5>"); ?></td>
							<td><?php echo ("<h5>" . $data_customer['email'] . "</h5>") ?></td>
                            <td><?php echo ("<h5>" . $data_customer['telepon'] . "</h5>") ?></td>
                            <td><?php echo ("<h5>" . $data_order['status'] . "</h5>") ?></td>
                            <td><?php echo ("<h5>" . $data_order['check_in'] . "</h5>") ?></td>
                            <td><?php echo ("<h5>" . $data_order['check_out'] . "</h5>") ?></td>
                            <td><?php echo ("<h5>" . $data_order['room_type'] . "</h5>") ?></td>
                            <td><?php echo ("<img src='" . $data_customer['ktp'] . "' alt='KTP' style='width: 350px; height: 210px; padding: 10px;'>") ?></td>
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