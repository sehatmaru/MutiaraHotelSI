<?php
    require_once(dirname(__FILE__).'/common/header.php');
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
                    <form action="reservation-process.php" method="post" role="form" class="contactForm" enctype="multipart/form-data">
                    <div class="text-center">        
                        <h2>Order Data</h2>
                    </div>
                    <div class="form-group col-md-12 col-md-offset-1">
                        <table>
                            <tr>
                                <td><h5>Check In </h5></td>
                                <td><h5>:</h5></td>
                                <td><h5><input type="date" name="check_in" class="form-control" required></h5></td>
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
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><h5>Room Type </h5></td>
                                <td><h5>:</h5></td>
                                <td>
                                    <select class="form-control" name="room_type">
                                        <?php 
                                            $host       = 'localhost';
                                            $user       = 'root';
                                            $pass       = '';
                                            $database   = 'hotel';

                                            $koneksi    = mysql_connect($host,$user,$pass);
                                            mysql_select_db($database);

                                            $sql        = "SELECT id_jenis_kamar, nama FROM jenis_kamar";

                                            $hasil_query= mysql_query($sql);

                                            while ($baris=mysql_fetch_row($hasil_query)) {
                                                echo "<option value='$baris[0]'>$baris[1]</option>";
                                            }
                                        ?>
                                </td>
                                <td><a href="room.php"><i class="fa fa-question fa" style="font-size: 13px; color: #111111;"></a></td>
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
                                <td><h5>Your Name </h5></td>
                                <td><h5>:</h5></td>
                                <td><input type="text" name="name" class="form-control" required></td>
                            </tr>
                    </div>
                        <div class="form-group col-md-12">
                            <tr>
                                <td><h5>Your E-mail </h5></td>
                                <td><h5>:</h5></td>
                                <td><input type="email" name="email" class="form-control" required></td>
                            </tr>
                        </div>
                        <div class="form-group col-md-12">
                            <tr>
                                <td><h5>Your Phone </h5></td>
                                <td><h5>:</h5></td>
                                <td><input type="text" name="phone" class="form-control" required></td>
                            </tr>
                        </div>
                        <div class="form-group col-md-12">
                            <tr>
                                <td><h5>Your KTP </h5></td>
                                <td><h5>:</h5></td>
                                <td><input type="file" name="ktp" class="form-control" accept="img/*"></td>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><p>MAX SIZE : 500KB</p></td>
                            </tr>
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