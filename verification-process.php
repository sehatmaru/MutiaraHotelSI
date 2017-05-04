<?php
    if(isset($_POST['submit'])){
        include(dirname(__FILE__).'/common/koneksi.php');
        
        $orders_id      = $_POST['orders_id'];
        $name           = $_POST['name'];
        $amount         = number_format($_POST['amount']);

        $current_select_orders     = mysql_query("SELECT * FROM orders");
        $data_current_orders    = mysql_fetch_array($current_select_orders);
        $current_orders_id  = $data_current_orders['orders_id'];

        if ($orders_id!=$current_orders_id) {
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
                                    <h2>Error while sending your verification !</h2>
                                    <p>Please verify your payment again.</p>
                                    <a href="payment-verification.php" class="btn btn-primary btn-lg">Payment Verification</a>
                                </div>
                            </div>
                        </section>    
            <?php
                require_once(dirname(__FILE__).'/common/footer.php');
        }else{
            //----START UPLOAD FILE----//
            if ($_FILES['bukti']['name']) {
                move_uploaded_file($_FILES['bukti']['tmp_name'], 'payment/' . $orders_id . '.jpg');
                $bukti = 'payment/' . $orders_id . '.jpg';
            }
            //----END UPLOAD FILE----//

            //----START RETRIEVE ROOM NO----//
            $query_select_orders     = mysql_query("SELECT * FROM orders WHERE orders_id='$orders_id'");
            $data_order     = mysql_fetch_array($query_select_orders);
            $room_no    = $data_order['room_no'];
            //----END RETRIEVE ROOM NO----//

            $query_payment  = mysql_query("INSERT INTO payment VALUES(NULL, '$orders_id', '1', '$room_no', '$orders_id', '$amount', '$bukti')") or die(mysql_errno()); //Insert payment data
            if(!isset($query_payment)){
                require_once(dirname(__FILE__).'/common/header.php');
            ?>
            <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        <title>Verify Success</title>

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
                                    <h2>Your payment verification has been sent !</h2>
                                </div>
                                <div class="text-center">        
                                    <table align="center">
                                        <tr>
                                            <td><h5><b>Costumer Name</b></h5></td>
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
                                            <td><h5><b><?php echo("IDR " . $amount); ?></b></h5></td>
                                        </tr>
                                    </table>
                                </div>
                                    </table>
                            </div>
                        </section>    
                    </body>
                </html>
            <?php
                require_once(dirname(__FILE__).'/common/footer.php');
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
                            <h2>Error while sending your verification !</h2>
                            <p>Please verify your payment again.</p>
                            <a href="payment-verification.php" class="btn btn-primary btn-lg">Payment Verification</a>
                        </div>
                    </div>
                </section>    
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
    }
        }
    }else{
        echo '<script>window.history.back()</script>';
    }
?>