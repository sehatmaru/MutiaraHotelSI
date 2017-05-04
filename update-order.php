<?php
    require_once(dirname(__FILE__).'/common/header.php');
    include (dirname(__FILE__).'/common/koneksi.php');

    $query_kamar    = "SELECT * FROM room_type";   //Retrieve room_type data
    $hasil_query    = mysql_query($query_kamar);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Order</title>

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
                    <form action="reservation-process.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
                    <div class="text-center">        
                        <h2>Order Data</h2>
                    </div>
                    <div class="form-group col-md-12 col-md-offset-1">
                        <table>
                            <tr>
                                <td><h5>Check In </h5></td>
                                <td><h5>:</h5></td>
                                <td colspan="2"><h5><input type="date" name="check_in" class="form-control" size="20" required></h5></td>
                            </tr>
                    </div>
                        <div class="form-group col-md-12">
                            <tr>
                                <td><h5>Check Out </h5></td>
                                <td><h5>:</h5></td>
                                <td><h5><input type="date" name="check_out" class="form-control" required></h5></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><h5>Status </h5></td>
                                <td><h5>:</h5></td>
                                <td>
                                    <select class="form-control" name="status">
                                        <option value="Corporate" id="Corporate">Corporate</option>
                                        <option selected="Non-Corporate" value="Non-Corporate" id="Non-Corporate">Non-Corporate</option>
                                    </select>   
                                </td>
                                <td><a href="status-info.php"><i class="fa fa-question-circle-o fa" style="font-size: 20px; color: #111111;"></a></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><h5>Room Type </h5></td>
                                <td><h5>:</h5></td>
                                <td>
                                    <select class="form-control" name="room_type">
                                        <?php 
                                            while ($baris=mysql_fetch_row($hasil_query)) {
                                                echo "<option value='$baris[0]'>$baris[1]</option>";
                                            }
                                        ?>
                                </td>
                                <td><a href="room.php"><i class="fa fa-question-circle-o fa" style="font-size: 20px; color: #111111;"></a></td>
                            </tr>
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
                                <td><h5>Full Name </h5></td>
                                <td><h5>:</h5></td>
                                <td><h5><input type="text" name="name" class="form-control" required></h5></td>
                            </tr>
                    </div>
                        <div class="form-group col-md-12">
                            <tr>
                                <td><h5>Email </h5></td>
                                <td><h5>:</h5></td>
                                <td><h5><input type="email" name="email" class="form-control" required></h5></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><h5>Phone </h5></td>
                                <td><h5>:</h5></td>
                                <td><h5><input type="text" name="phone" class="form-control" required></h5></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><h5>KTP </h5></td>
                                <td><h5>:</h5></td>
                                <td><h5><input type="file" name="ktp" accept="img/*" required></h5></td>
                            </tr>
                        </table>
                    </div>
                </div>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required>Order</button></div>
            </form>
        </div>
    </section>    
</body>
</html>
<?php
    require_once(dirname(__FILE__).'/common/footer.php');
?>