<?php
    require_once(dirname(__FILE__).'/common/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment Verification</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>
  </head>
  <body>
	<section class="contact-page">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <form action="payment-process.php" method="POST" role="form" class="contactForm" enctype="multipart/form-data">
            <div class="text-center">        
                <h2>Payment Verification</h2>
                <p>Please input your <code>order id</code> with right code.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="form-group col-md-6 col-md-offset-3">
                    <table>
                        <tr>
                            <td><h5><b>Order ID</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td><input type="text" name="orders_id" class="form-control" size="58" required></td>
                        </tr>
                        <tr>
                            <td><h5><b>Name</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td><input type="text" name="name" class="form-control" size="58" required></td>
                        </tr>
                        <tr>
                            <td><h5><b>Amount</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td><input type="text" name="amount" class="form-control" size="58" required></td>
                        </tr>
                        <tr>
                            <td><h5><b>Payment</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td><h5><input type="file" name="payment" accept="img/*" required></h5></td>
                        </tr>
                    </table>
                     <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required>Verify</button></div>
                    </form>                     
                </div>
            </div>
        </div>
    </section>    
</body>

<?php
    require_once(dirname(__FILE__).'/common/footer.php');
?>