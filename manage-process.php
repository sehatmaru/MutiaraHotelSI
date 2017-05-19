<?php
	include(dirname(__FILE__).'/common/koneksi.php');
	        
	$room_no  	= $_GET['room_no'];
	$keterangan	= $_GET['keterangan'];
    $admin_id   = $_GET['administrator_id'];

    $select_manage  = mysql_query("SELECT * FROM manage_room WHERE room_no='$room_no'");
    $data_manage    = mysql_fetch_array($select_manage);
    $data_room_no   = $data_manage['room_no'];

    if (isset($data_room_no)) {
        $update_manage_room = mysql_query("UPDATE manage_room SET administrator_id='$admin_id', keterangan='$keterangan' WHERE room_no='$room_no'") or die(mysql_error());
        $update_room = mysql_query("UPDATE room SET keterangan='$keterangan' WHERE room_no='$room_no'");

        if ($update_manage_room && $update_room){
            header('Location: room-list.php');
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
                                <h2>Error while sending update room !</h2>
                            </div>
                        </div>
                    </section>    
                </body>
                </html>
        <?php
            require_once(dirname(__FILE__).'/common/footer.php');
        }
    }else{
        $query_manage = mysql_query("INSERT INTO manage_room VALUES('$admin_id', '$room_no', '$keterangan')") or die(mysql_error());
        $update_room = mysql_query("UPDATE room SET keterangan='$keterangan' WHERE room_no='$room_no'");

        if ($update_room && $query_manage){
            header('Location: room-list.php');
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
                                <h2>Error while sending update room !</h2>
                            </div>
                        </div>
                    </section>    
                </body>
                </html>
        <?php
            require_once(dirname(__FILE__).'/common/footer.php');
        }
    }
    ?>
