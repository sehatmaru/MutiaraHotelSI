<?php 
    require_once(dirname(__FILE__).'/common/header-dashboard.php');
    include(dirname(__FILE__).'/common/koneksi.php');

    $customer   = $_GET['id'];

    $query_customer = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_id='$customer'") or die(mysqli_error());  //Retrieve data customer
    $data_customer = mysqli_fetch_array($query_customer);
?>
            <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <title>Customer Data</title>

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
                                <h2>Customer Data #<?php echo($customer) ?></h2>
                            </div>
                            <div class="text-center"> 
                                <table class="table">
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Customer ID</b></h5></td>
                                        <td style="color: red; font-size: 14px;padding-top: 16px"><b><?php echo($data_customer['customer_id']) ?></b></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3" width="200px"><h5><b>Costumer Name</b></h5></td>
                                        <td><h5><b><?php echo($data_customer['name']) ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Email</b></h5></td>
                                        <td><h5><b><?php echo($data_customer['email']); ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>Phone</b></h5></td>
                                        <td><h5><b><?php echo($data_customer['phone']); ?></b></h5></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E3E3E3"><h5><b>KTP</b></h5></td>
                                        <?php echo "<td align='center'><img src='" . $data_customer['ktp'] . "' style='width:600px; height:300px;'></td>" ?>
                                    </tr>
                                </table>
                                <a class="btn btn-primary btn-lg" href="order-list.php">Back</a>
                            </div>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
            <?php
                require_once(dirname(__FILE__).'/common/footer.php');