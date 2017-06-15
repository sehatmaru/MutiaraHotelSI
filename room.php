<?php
	require_once(dirname(__FILE__).'/common/header.php');
	include (dirname(__FILE__).'/common/koneksi.php');

	$check_in       = $_POST['check_in'];
    $check_out      = $_POST['check_out'];
    $status         = $_POST['status'];

    $name           = $_POST['name'];
	$email          = $_POST['email'];
	$phone          = $_POST['phone'];

	if ($_FILES['ktp']['name']) {
            move_uploaded_file($_FILES['ktp']['tmp_name'], 'img/ktp/' . $name . '_ktp.jpg');
            $ktp = 'img/ktp/' . $name . '_ktp.jpg';
    }

    $studio    		= ("SELECT * FROM room WHERE keterangan='Kosong' AND room_type_id='1'");
    $query_studio   = mysqli_query($koneksi, $studio);
    $count_studio	= mysqli_num_rows($query_studio);

    $superior    	= ("SELECT * FROM room WHERE keterangan='Kosong' AND room_type_id='2'");
    $query_superior = mysqli_query($koneksi, $superior);
    $count_superior	= mysqli_num_rows($query_superior);
    
    $deluxe    		= ("SELECT * FROM room WHERE keterangan='Kosong' AND room_type_id='3'");
    $query_deluxe   = mysqli_query($koneksi, $deluxe);
    $count_deluxe	= mysqli_num_rows($query_deluxe);
    
    $exec    		= ("SELECT * FROM room WHERE keterangan='Kosong' AND room_type_id='4'");
    $query_exec   	= mysqli_query($koneksi, $exec);
    $count_exec		= mysqli_num_rows($query_exec);

    $current_select_customer    = mysqli_query($koneksi, "SELECT * FROM customer WHERE name='$name'");  //Retrieve data customer
        $current_data_customer = mysqli_fetch_array($current_select_customer);
        $current_custumer_id  = $current_data_customer['customer_id'];
        $current_select_order    = mysqli_query($koneksi, "SELECT * FROM orders WHERE orders_id='$current_custumer_id'");
        $current_data_order = mysqli_fetch_array($current_select_order);

        if (($name==$current_data_customer['name']) && ($phone==$current_data_customer['phone'])) {
            require_once(dirname(__FILE__).'/common/header.php');
        ?>
            <!DOCTYPE html>
                <html lang="en">
                                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <title>Warning !</title>

                    <link href="css/bootstrap.min.css" rel="stylesheet">
                    <link rel="stylesheet" href="css/font-awesome.min.css">
                    <link rel="stylesheet" href="css/animate.css">
                    <link href="css/animate.min.css" rel="stylesheet"> 
                    <link href="css/style.css" rel="stylesheet" />

                    <script src="js/jquery.js"></script>        
                    <script src="js/bootstrap.min.js"></script> 
                    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
                    <script src="js/wow.min.js"></script>
                    <script>wow = new WOW({}).init();</script>  
                </head>
                <body>  
                    <section class="contact-page">
                        <div class="container">
                            <div class="text-center">
                                <h2>Order will not sent</h2>
                                <p>You have been sent your order before</p>
                            </div>
                            <div class="text-center col-md-6"> 
                                <table class="table">
                                    <tr>
                                        <td bgcolor="#E3E3E3" width="200px"><h5><b>Costumer Name</b></h5></td>
                                        <td><h5><b><?php echo($current_data_customer['name']) ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Order ID</b></h5></td>
                                        <td style="color: red; font-size: 14px;padding-top: 16px"><b><?php echo($current_data_order['orders_id']) ?></b></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Check In</b></h5></td>
                                        <td><h5><b><?php echo($current_data_order['check_in']); ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Check In</b></h5></td>
                                        <td><h5><b><?php echo($current_data_order['check_out']); ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Ordered</b></h5></td>
                                        <td><h5><b><?php echo($current_data_order['ordered']); ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Payment</b></h5></td>
                                        <td><h5><b>IDR <?php echo($current_data_order['payment']) ?></b></h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="text-center col-md-6">
                            <h3>Please pay your order to this Bank Account :</h3>
                            <table class="table">
                                <tr>
                                    <td bgcolor="#E3E3E3" width="200px"><h5><b>A/N</b></h5></td>
                                    <td><h5><b>Mutiara Balige Hotel</b></h5></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#E3E3E3"><h5><b>Bank Account</b></h5></td>
                                    <td style="color: red; font-size: 14px;"><b>434955935</b></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#E3E3E3"><h5><b>Bank Type</b></h5></td>
                                    <td><h5><b>BNI</b></h5></td>
                                </tr>
                            </table><br>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4><b>NOTE </b>Not order before ? Plese <b><a href="contact.php">contact us</a></b> for more information.</h4>
                            <a class="btn btn-primary btn-lg" href="payment-verification.php">Verify Payment</a>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
            <?php
                require_once(dirname(__FILE__).'/common/footer.php');
        }else{?>
        	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Room Type</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
				<h2>Room Type</h2>	
			</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<div class="text-center">
						<img src="img/kamar-studio.jpg" style="width: 250px; height: 125px; border-bottom-right-radius: 100px; border-top-left-radius: 100px;">
						<h3>STUDIO</h3>
						<h5><b>Rp 250.000/Night</b></h5>
				<form action="reservation-process.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
					<h5><input type="text" name="check_in" hidden value="<?php echo $check_in ?>"></h5>
					<h5><input type="text" name="check_out" hidden value="<?php echo $check_out ?>"></h5>
					<h5><input type="text" name="status" hidden value="<?php echo $status ?>"></h5>
					<h5><input type="text" name="name" hidden value="<?php echo $name ?>"></h5>
					<h5><input type="text" name="email" hidden value="<?php echo $email ?>"></h5>
					<h5><input type="text" name="phone" hidden value="<?php echo $phone ?>"></h5>
					<h5><input type="text" name="ktp" hidden value="<?php echo $ktp ?>"></h5>
					<h5><input type="text" name="room_type" hidden value="1"></h5>
						<?php echo("<button type='submit' name='submit' class='btn btn-lg'>". $count_studio ." ROOM(S) AVAILABLE</button>") ?>
				</form>
					</div>
					<div class="contact-info">
						<ul style="">
							<li><i class="fa fa-television fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Television</b></i></li>
							<li><i class="fa fa-shower fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Hot & Cold Water Showerhead</b></i></li>
							<li><i class="fa fa-coffee fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Mineral Water</b></i></li>
							<li><i class="fa fa-wifi fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Free Wi-Fi</b></i></li>
							<li><i class="fa fa-bed fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Single Bed 4"</b></i></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="text-center">
						<img src="img/kamar-superior.jpg" style="width: 250px; height: 125px; border-bottom-right-radius: 100px; border-top-left-radius: 100px;">
						<h3>SUPERIOR</h3>
						<h5><b>Rp 450.000/Night</b></h5>
				<form action="reservation-process.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
					<h5><input type="text" name="check_in" hidden value="<?php echo $check_in ?>"></h5>
					<h5><input type="text" name="check_out" hidden value="<?php echo $check_out ?>"></h5>
					<h5><input type="text" name="status" hidden value="<?php echo $status ?>"></h5>
					<h5><input type="text" name="name" hidden value="<?php echo $name ?>"></h5>
					<h5><input type="text" name="email" hidden value="<?php echo $email ?>"></h5>
					<h5><input type="text" name="phone" hidden value="<?php echo $phone ?>"></h5>
					<h5><input type="text" name="ktp" hidden value="<?php echo $ktp ?>"></h5>
					<h5><input type="text" name="room_type" hidden value="2"></h5>
						<?php echo("<button type='submit' name='submit' class='btn btn-lg'>". $count_superior ." ROOM(S) AVAILABLE</button>") ?>
				</form>
					</div>
					<div class="contact-info">
						<ul>
							<li><i class="fa fa-television fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Television</b></i></li>
							<li><i class="fa fa-shower fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Hot & Cold Water Showerhead</b></i></li>
							<li><i class="fa fa-coffee fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Mineral Water</b></i></li>
							<li><i class="fa fa-wifi fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Free Wi-Fi</b></i></li>
							<li><i class="fa fa-bed fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">King/Twins Bed</b></i></li>
							<li><i class="fa fa-street-view fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Balcony View</b></i></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
					<div class="text-center">
						<img src="img/kamar-deluxe.jpg" style="width: 250px; height: 125px; border-bottom-right-radius: 100px; border-top-left-radius: 100px;">
						<h3>DELUXE</h3>
						<h5><b>Rp 650.000/Night</b></h5>
				<form action="reservation-process.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
					<h5><input type="text" name="check_in" hidden value="<?php echo $check_in ?>"></h5>
					<h5><input type="text" name="check_out" hidden value="<?php echo $check_out ?>"></h5>
					<h5><input type="text" name="status" hidden value="<?php echo $status ?>"></h5>
					<h5><input type="text" name="name" hidden value="<?php echo $name ?>"></h5>
					<h5><input type="text" name="email" hidden value="<?php echo $email ?>"></h5>
					<h5><input type="text" name="phone" hidden value="<?php echo $phone ?>"></h5>
					<h5><input type="text" name="ktp" hidden value="<?php echo $ktp ?>"></h5>
					<h5><input type="text" name="room_type" hidden value="3"></h5>
						<?php echo("<button type='submit' name='submit' class='btn btn-lg'>". $count_deluxe ." ROOM(S) AVAILABLE</button>") ?>
				</form>
					</div>
					<div class="contact-info">
						<ul>
							<li><i class="fa fa-television fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Television</b></i></li>
							<li><i class="fa fa-shower fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Hot & Cold Water Showerhead</b></i></li>
							<li><i class="fa fa-coffee fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Mineral Water</b></i></li>
							<li><i class="fa fa-wifi fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Free Wi-Fi</b></i></li>
							<li><i class="fa fa-bed fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">King/Twins Bed</b></i></li>
							<li><i class="fa fa-street-view fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Balcony View</b></i></li>
							<li><i class="fa fa-snowflake-o fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">AC</b></i></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
					<div class="text-center">
						<img src="img/kamar-executive.jpg" style="width: 250px; height: 125px; border-bottom-right-radius: 100px; border-top-left-radius: 100px;">
						<h3>EXECUTIVE</h3>
						<h5><b>Rp 850.000/Night</b></h5>
				<form action="reservation-process.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
					<h5><input type="text" name="check_in" hidden value="<?php echo $check_in ?>"></h5>
					<h5><input type="text" name="check_out" hidden value="<?php echo $check_out ?>"></h5>
					<h5><input type="text" name="status" hidden value="<?php echo $status ?>"></h5>
					<h5><input type="text" name="name" hidden value="<?php echo $name ?>"></h5>
					<h5><input type="text" name="email" hidden value="<?php echo $email ?>"></h5>
					<h5><input type="text" name="phone" hidden value="<?php echo $phone ?>"></h5>
					<h5><input type="text" name="ktp" hidden value="<?php echo $ktp ?>"></h5>
					<h5><input type="text" name="ktp" hidden value="4"></h5>
						<?php echo("<button type='submit' name='submit' class='btn btn-lg'>". $count_exec ." ROOM(S) AVAILABLE</button>") ?>
				</form>
					</div>
					<div class="contact-info">
						<ul style="">
							<li><i class="fa fa-television fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Television</b></i></li>
							<li><i class="fa fa-shower fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Hot & Cold Water Showerhead</b></i></li>
							<li><i class="fa fa-coffee fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Mineral Water</b></i></li>
							<li><i class="fa fa-wifi fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Free Wi-Fi</b></i></li>
							<li><i class="fa fa-bed fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">King/Twins Bed</b></i></li>
							<li><i class="fa fa-street-view fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">Balcony View</b></i></li>
							<li><i class="fa fa-snowflake-o fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 12px;">AC</b></i></li>
							<li><i class="fa fa-glass fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 13px;">Mini Bar</b></i></li>
							<li><i class="glyphicon glyphicon-fire" style="font-size: 13px; color: #111111;">&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 13px;">Water Heater</b></i></li>
							<li><i class="fa fa-lemon-o fa" style="font-size: 13px; color: #111111;">&nbsp;&nbsp;&nbsp;&nbsp;<b style="padding-bottom: 5px; color: #aaa; font-family:'Open Sans', Arial, sans-serif; font-size: 13px;">Bathrobe</b></i></li>
						</ul>
						</form>
					</div>
				</div>
		</div>
	</div>	
</body>
</html>

	<?php
		require_once(dirname(__FILE__).'/common/footer.php');
        }
    ?>