<?php
	include(dirname(__FILE__).'/common/koneksi.php');
	        
	$orders	= $_GET['id'];

	$select_orders 	= mysql_query("SELECT * FROM orders WHERE orders_id='$orders'");
	$data_orders	= mysql_fetch_array($select_orders);
	$room_no		= $data_orders['room_no'];
	$update_room    = mysql_query("UPDATE room SET keterangan='Kosong' WHERE room_no='$room_no'");
	$delete_orders 	= mysql_query("DELETE FROM orders WHERE orders_id='$orders'");
	$delete_customer= mysql_query("DELETE FROM customer WHERE customer_id='$orders'");
	$delete_payment = mysql_query("DELETE FROM payment WHERE orders_id='$orders'");

	if ($delete_orders && $delete_customer){
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
                            <h2>Error while deleting order !</h2>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
	}
?>