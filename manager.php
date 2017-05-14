<?php
    require_once(dirname(__FILE__).'/common/header-dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manager Dashboard</title>

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
                <h2>Welcome, Harrys Simanungkalit !</h2>           
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <a href="order-list.php"><i class="fa fa-inbox"></i>
                    <h3>Order List</h3></a>
                </div>
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <a href="room-list.php"><i class="fa fa-cog"></i>
                    <h3>Room Editor</h3></a>
                </div>
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <a href="payment-list.php"><i class="fa fa-check-circle-o"></i>  
                    <h3>Payment Verification</h3></a>
                </div>
                <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <a href="feedback-list.php"><i class="fa fa-comments"></i>  
                    <h3>Feedback List</h3></a>
                </div>
            </div>
        </div>
    </div>
<?php
        require_once(dirname(__FILE__).'/common/footer.php');
?>