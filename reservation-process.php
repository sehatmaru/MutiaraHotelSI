<?php
    if(isset($_POST['submit'])){
        include('koneksi.php');
        
        $check_in       = $_POST['check_in'];
        $check_out      = $_POST['check_out'];
        $status         = $_POST['status'];
        $room_type      = $_POST['room_type'];

        $name           = $_POST['name'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];

        //----START UPLOAD FILE----//
        if ($_FILES['ktp']['name']) {
            move_uploaded_file($_FILES['ktp']['tmp_name'], 'ktp/' . $name . '.jpg');
            $ktp = 'ktp/' . $name . '.jpg';
        }
        //----END UPLOAD FILE----//

        //----START DAY COUNT----//
        $start_date = new DateTime($check_in);
        $end_date   = new DateTime($check_out);
        $interval   = $start_date->diff($end_date);
        $count      = $interval->days;
        //----END DAY COUNT----//

        $query_customer = mysql_query("INSERT INTO customer VALUES(NULL, '$name', '$email', '$phone', '$ktp')") or die(mysql_error());  //Insert Customer data
       
        $query_select_kamar    = mysql_query("SELECT * FROM jenis_kamar WHERE id_jenis_kamar='$room_type'")or die(mysql_error());   //Retrieve jenis_kamar data
        $data_kamar = mysql_fetch_array($query_select_kamar);
        $data_harga = $data_kamar['harga'];

        $jumlah_harga = ($count*$data_harga);
        $jumlah_harga_db =  number_format($jumlah_harga);

        $query_select_customer    = mysql_query("SELECT * FROM customer WHERE name='$name'")or die(mysql_error());  //Retrieve customer data
        $data_costumer = mysql_fetch_array($query_select_customer);
        $data_id       = $data_costumer['customer_id'];

        $query_order   = mysql_query("INSERT INTO pesanan VALUES(NULL, '$name', '$check_in', '$check_out', '$room_type', '$status')") or die(mysql_error());    //Insert Order data

        if($query_order && $query_customer){
                require_once(dirname(__FILE__).'/common/header.php');
            ?>
            <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        <title>Order Success !</title>

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
                                            <td><h5><b>Costumer ID</b></h5></td>
                                            <td><h5><b> : </b></h5></td>
                                            <td style="color: red; font-size: 14px;"><b><?php echo($data_id) ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><h5><b>Day Long</b></h5></td>
                                            <td><h5><b> : </b></h5></td>
                                            <td><h5><b><?php echo($count . " day(s)"); ?></b></h5></td>
                                        </tr>
                                        <tr>
                                            <td><h5><b>Amount to Pay</b></h5></td>
                                            <td><h5><b> : </b></h5></td>
                                            <td><h5><b>Rp <?php echo($jumlah_harga_db) ?></b></h5></td>
                                        </tr>
                                        <tr>
                                            <td><h5><b></b></h5></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <h4>Please pay your order to this Bank Account :</h4>
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
        echo '<script>window.history.back()</script>';
    }
?>