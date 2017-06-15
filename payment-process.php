<?php
    if(isset($_POST['submit'])){
    	include(dirname(__FILE__).'/common/koneksi.php');
        
        $orders_id      = $_POST['orders_id'];
        $name			= $_POST['name'];
        $amount			= $_POST['amount'];

        $current_select_order	= mysqli_query($koneksi, "SELECT * FROM orders WHERE orders_id='$orders_id'");
        $current_data_order 	= mysqli_fetch_array($current_select_order);
        $current_select_payment	= mysqli_query($koneksi, "SELECT * FROM payment WHERE orders_id='$orders_id'");
        $current_data_payment	= mysqli_fetch_array($current_select_payment);
        $current_select_customer= mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_id='$orders_id'");
        $current_data_customer  = mysqli_fetch_array($current_select_customer);

        if (($orders_id==$current_data_order['orders_id'])&&($name==$current_data_customer['name'])&&($amount==$current_data_order['payment'])) {
        	if ($orders_id==$current_data_payment['orders_id']) {
        		$select_customer = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_id='$orders_id'");
        		$data_customer = mysqli_fetch_array($select_customer);

	        	require_once(dirname(__FILE__).'/common/header.php');?>

	        	<!DOCTYPE html>
	        	<html lang="en">
	        	<head>
	        		<meta charset="utf-8">
	        		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	        		<meta name="viewport" content="width=device-width, initial-scale=1">

	        		<title>Error</title>

	        		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	        		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	        		<link rel="stylesheet" type="text/css" href="css/animate.css">
	        		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	        		<link rel="stylesheet" type="text/css" href="css/style.css">

	        		<script src="js/jquery.js"></script>
	        		<script src="js/bootstrap.min.js"></script>
	        		<script src="js/wow.min.js"></script>
	        		<script>wow = new WOW({}).init();</script>
	        	</head>
	        	<body>
	        		<section class="contact-page">
	        			<div class="container">
	        				<div class="text-center">
	        					<h2>Payment will not sent</h2>
	        					<p>You have sent your payment before.</p>
	        				</div>
	        				<div class="text-center">
	        					<table align="center">
	        						<tr>
	        							<td><h5><b>Order ID</b></h5></td>
                                        <td><h5><b> : </b></h5></td>
	        							<td><h5><b><?php echo($current_data_order['orders_id']) ?></b></h5></td>
	        						</tr>
	        						<tr>
	        							<td><h5><b>Customer Name</b></h5></td>
                                        <td><h5><b> : </b></h5></td>
	        							<td><h5><b><?php echo($data_customer['name']) ?></b></h5></td>
	        						</tr>
	        						<tr>
	        							<td><h5><b>Amount</b></h5></td>
                                        <td><h5><b> : </b></h5></td>
	        							<td><h5><b>IDR <?php echo($current_data_payment['amount']) ?></b></h5></td>
	        						</tr>
	        					</table>
                                <h4>Please wait our information about your order & room number.<br>Thank you for choosing our hotel.</h4>
	        				</div>
	        			</div>
	        		</section>
	        	<?php require_once(dirname(__FILE__).'/common/footer.php');
        	}else{
        		if ($_FILES['payment']['name']) {
            		move_uploaded_file($_FILES['payment']['tmp_name'], 'img/payment/' . $orders_id . '_payment.jpg');
            		$payment = 'img/payment/' . $orders_id . '_payment.jpg';
            	}

        		$query_select_orders = mysqli_query($koneksi, "SELECT * FROM orders WHERE orders_id='$orders_id'");
        		$data_order = mysqli_fetch_array($query_select_orders);
        		$room_no = $data_order['room_no'];

        		$amountdb = number_format($amount);
                $payed = date('Y-m-d');

        		$query_payment = mysqli_query($koneksi, "INSERT INTO payment VALUES(NULL, '$orders_id', '1', '$room_no', '$orders_id', '$amountdb', '$payed', '$payment')");

        		if ($query_payment) {
        			require_once(dirname(__FILE__)).'/common/header.php';?>

        			<!DOCTYPE html>
        			<html lang="en">
        			<head>
        				<meta charset="utf-8">
		        		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		        		<meta name="viewport" content="width=device-width, initial-scale=1">

		        		<title>Payment Success</title>

		        		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		        		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		        		<link rel="stylesheet" type="text/css" href="css/animate.css">
		        		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
		        		<link rel="stylesheet" type="text/css" href="css/style.css">

		        		<script src="js/jquery.js"></script>
		        		<script src="js/bootstrap.min.js"></script>
		        		<script src="js/wow.min.js"></script>
		        		<script>wow = new WOW({}).init();</script>
        			</head>
        			<body>
        				<section class="contact-page">
        					<div class="container">
        						<div class="text-center">
                            		<h2>Your payment has been sent</h2>
                                </div>
        					</div>
        					<div class="text-center">
        						<table align="center">
        							<tr>
        								<td><h5><b>Customer Name</b></h5></td>
        								<td><h5><b> : </b></h5></td>
        								<td><h5><b><?php echo($name) ?></b></h5></td>
        							</tr>
        							<tr>
        								<td><h5><b>Order ID</b></h5></td>
        								<td><h5><b> : </b></h5></td>
        								<td style="color: red; font-size: 14px;"><b><?php echo($orders_id) ?></b></td>
        							</tr>
        							<tr>
        								<td><h5><b>Amount</b></h5></td>
        								<td><h5><b> : </b></h5></td>
        								<td><h5><b><?php echo("IDR " . $amountdb) ?></b></h5></td>
        							</tr>
        						</table>
                                <h4>Please wait our information about your order & room number.<br>Thank you for choosing our hotel.</h4>
        					</div>
        				</section>
        			</body>
        		<?php
        			require_once(dirname(__FILE__).'/common/footer.php');
        		}
        	}
        }else{
        	require_once(dirname(__FILE__).'/common/header.php');?>

        	<!DOCTYPE html>
        	<html lang="en">
        	<head>
        		<meta charset="utf-8">
        		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        		<meta name="viewport" content="width=device-width, initial-scale=1">

        		<title>Error</title>

        		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        		<link rel="stylesheet" type="text/css" href="css/animate.css">
        		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
        		<link rel="stylesheet" type="text/css" href="css/style.css">

        		<script src="js/jquery.js"></script>
        		<script src="js/bootstrap.min.js"></script>
        		<script src="js/wow.min.js"></script>
        		<script>wow = new WOW({}).init();</script>
        	</head>
        	<body>
        		<section class="contact-page">
        			<div class="container">
        				<div class="text-center">
        					<h2>Payment will not sent</h2>
        					<p><code><b>Order ID</b></code> or <code><b>Name</b></code> or <code><b>Amount</b></code> you've entered incorrect.<br>Please check and verify your payment again.</p>
        					<a href="payment-verification.php" class="btn btn-primary btn-lg">Back</a>
        				</div>
        			</div>
        		</section>
        	<?php require_once(dirname(__FILE__).'/common/footer.php');
        }
   	}else{
   		echo '<script>window.history.back()</script>';
   	}
?>