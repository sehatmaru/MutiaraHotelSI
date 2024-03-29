<?php
	include(dirname(__FILE__).'/common/koneksi.php');
	        
	$orders	= $_GET['id'];

	$check_in = mysqli_query($koneksi, "UPDATE orders SET keterangan='Check In' WHERE orders_id='$orders'");
    $query_order = mysqli_query($koneksi, "SELECT * FROM orders WHERE orders_id='$orders'");
    $data_order = mysqli_fetch_array($query_order);
    $room_no    = $data_order['room_no'];
    $update_room = mysqli_query($koneksi, "UPDATE room SET keterangan='Filled' WHERE room_no='$room_no'");

	if ($check_in && $update_room){
	    header('Location: order-list.php');
	}else{
	    require_once(dirname(__FILE__).'/common/header.php');
        ?>
            <!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Error !</title>

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
                            <h2>Error while check in !</h2>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
	}
?>