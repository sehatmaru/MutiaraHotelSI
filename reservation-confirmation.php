<?php
    if(isset($_POST['submit'])){

        require_once(dirname(__FILE__).'/common/header.php');

        $check_in       = $_POST['ci_date'] . '-' . $_POST['ci_month'] . '-' . $_POST['ci_year'];
        $check_out      = $_POST['co_date'] . '-' . $_POST['co_month'] . '-' . $_POST['co_year'];
        $check_in_db    = $_POST['ci_date'] . '-' . $_POST['ci_month'] . '-' . $_POST['ci_year'];
        $check_out_db   = $_POST['co_date'] . '-' . $_POST['co_month'] . '-' . $_POST['co_year'];
        $status         = $_POST['status'];
        $room_type      = $_POST['room_type'];

        $name           = $_POST['name'];
        $address        = $_POST['address'];
        $phone          = $_POST['phone'];
        $ktp            = $_POST['ktp']
    ?>

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Room Reservation</title>

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
        <section class="contact-page">
            <div class="container">
                <div class="row contact-wrap">
                    <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <form action="reservation-process.php" method="post" role="form" class="contactForm">
                        <div class="text-center">        
                            <h2>Order Data</h2>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-1">
                            <table>
                                <tr>
                                    <td><h5>Check In </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($check_in); ?>" readonly></b></h5></td>
                                </tr>
                        </div>
                            <div class="form-group col-md-12">
                                <tr>
                                    <td><h5>Check Out </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($check_out); ?>" readonly></b></h5></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><h5>Status </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($status); ?>" readonly></b></h5></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><h5>Room Type </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($room_type); ?>" readonly></b></h5></td>
                                </tr>
                            </div>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="text-center">
                            <h2>Customer Data</h2>
                        </div> 
                        <div class="form-group col-md-12 col-md-offset-1">
                            <table>
                                <tr>
                                    <td><h5>Your Name </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($name); ?>"></b></h5></td>
                                </tr>
                        </div>
                            <div class="form-group col-md-12">
                                <tr>
                                    <td><h5>Your Address </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($address); ?>"></b></h5></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><h5>Your Phone </h5></td>
                                    <td><h5>:</h5></td>
                                    <td><h5><b><input type="text" name="id" size="40" value="<?php echo($phone); ?>"></b></h5></td>
                                </tr>
                            </div>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Confirm</button>
                    <button type="reset" name="reset" class="btn btn-primary btn-lg">Reset</button>
                </div>
                </form>
            </div>
        </section>    
    </body>
    </html>
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
    }else{
        echo '<script>window.history.back()</script>';
    }
?>