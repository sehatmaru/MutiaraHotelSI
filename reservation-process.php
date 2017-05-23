<?php
    if(isset($_POST['submit'])){
        include(dirname(__FILE__).'/common/koneksi.php');
        
        $check_in       = $_POST['check_in'];
        $check_out      = $_POST['check_out'];
        $status         = $_POST['status'];
        $room_type      = $_POST['room_type'];

        $name           = $_POST['name'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];

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
        }else{
            //----START UPLOAD FILE----//
        if ($_FILES['ktp']['name']) {
            move_uploaded_file($_FILES['ktp']['tmp_name'], 'img/ktp/' . $name . '_ktp.jpg');
            $ktp = 'img/ktp/' . $name . '_ktp.jpg';
        }
        //----END UPLOAD FILE----//

        //----START DAY COUNT----//
        $start_date = new DateTime($check_in);
        $end_date   = new DateTime($check_out);
        $interval   = $start_date->diff($end_date);
        $length_of_stay  = $interval->days;
        //----END DAY COUNT----//

        $query_customer = mysqli_query($koneksi, "INSERT INTO customer VALUES(NULL, '$name', '$email', '$phone', '$ktp')");  //Insert Customer data

        //----START RETRIEVE CUSTOMER ID----//
        $query_select_customer    = mysqli_query($koneksi, "SELECT * FROM customer WHERE phone='$phone'");  //Retrieve data customer
        $data_customer = mysqli_fetch_array($query_select_customer);
        $customer_id    = $data_customer['customer_id'];    //Retrieve customer_id
        $customer_name  = $data_customer['name'];
        //----END RETRIEVE CUSTOMER ID----//

        //----START RETRIEVE ROOM NO----//
        $query_select_kamar     = mysqli_query($koneksi, "SELECT * FROM room WHERE room_type_id='$room_type' AND keterangan='Kosong'");
        $data_kamar     = mysqli_fetch_array($query_select_kamar);
        
        if (isset($data_kamar['room_no'])) {
            $room_no = $data_kamar['room_no'];
            //----START RETRIEVE PRICE----//
        $query_select_jenis_kamar    = mysqli_query($koneksi, "SELECT * FROM room_type WHERE room_type_id='$room_type'");   //Retrieve jenis_kamar data
        $data_jenis_kamar = mysqli_fetch_array($query_select_jenis_kamar);
        if ($status='Corporate') {
            $diskon = $data_jenis_kamar['price']*((10)/(100));
            $data_harga = $data_jenis_kamar['price']-$diskon;
        }else{
            $data_harga = $data_jenis_kamar['price'];
        }
        //----END RETRIEVE PRICE----//

        $payment = number_format($length_of_stay*$data_harga);  //Payment total with currency format
        $ordered = date('Y-m-d');

        $query_order   = mysqli_query($koneksi, "INSERT INTO orders VALUES(NULL, '$customer_id', '$room_no', '$check_in', '$check_out', '$status', '$ordered', '$payment', 'Not Verified')");    //Insert Order data

        //----START RETRIEVE ORDER ID----//
        $query_select_order    = mysqli_query($koneksi, "SELECT * FROM orders WHERE orders_id='$customer_id'");  //Retrieve data order
        $data_order = mysqli_fetch_array($query_select_order);
        $order_id   = $data_order['orders_id'];
        //----END RETRIEVE ORDER ID----//

        $query_room_update = mysqli_query($koneksi, "UPDATE room SET keterangan='Dipesan' WHERE room_no='$room_no'");   //Insert keterangan data
            if($query_order && $query_customer){
                require_once(dirname(__FILE__).'/common/header.php');
            ?>
            <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        <title>Order Success</title>

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
                                    <h2>Your order has been sent !</h2>
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
                                            <td><h5><b>IDR <?php echo($payment) ?></b></h5></td>
                                        </tr>
                                        <tr>
                                            <td><h5><b></b></h5></td>
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
                                    <a class="btn btn-primary btn-lg" href="payment-verification.php">Verify Payment</a>
                                </div>
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
                            <h2>Error while sending your order !</h2>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
    }
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
                            <h2>Sorry, your room type is full</h2>
                            <p>Please order with other room type.</p>
                            <a class="btn btn-primary btn-lg" href="reservation.php">Order Room</a>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
    }
        }
    }else{
        echo '<script>window.history.back()</script>';
    }
?>