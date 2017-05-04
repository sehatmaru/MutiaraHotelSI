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
                    <h2>You has sent your order before</h2>
                    <p>Your order will not sent</p>
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
                            <td style="color: red; font-size: 14px;"><b><?php echo($order_id) ?></b></td>
                        </tr>
                        <tr>
                            <td><h5><b>Length of Stay</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td><h5><b><?php echo($length_of_stay . " day(s)"); ?></b></h5></td>
                        </tr>
                        <tr>
                            <td><h5><b>Payment</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td><h5><b>Rp <?php echo($payment) ?></b></h5></td>
                        </tr>
                    </table>
                </div>
                <div class="text-center">
                <h3>Please pay your order to this Bank Account :</h3>
                <table align="center">
                    <tr>
                        <td><h5><b>A/N</b></h5></td>
                        <td><h5><b> : </b></h5></td>
                        <td><h5><b>Mutiara Balige Hotel</b></h5></td>
                    </tr>
                    <tr>
                        <td><h5><b>Bank Account</b></h5></td>
                        <td><h5><b> : </b></h5></td>
                        <td style="color: red; font-size: 14px;"><b>434955935</b></td>
                    </tr>
                    <tr>
                        <td><h5><b>Bank Type</b></h5></td>
                        <td><h5><b> : </b></h5></td>
                        <td><h5><b>BNI</b></h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>    
</body>
</html>
<?php
    require_once(dirname(__FILE__).'/common/footer.php');
?>