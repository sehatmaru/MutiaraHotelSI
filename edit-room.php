<?php 
    require_once(dirname(__FILE__).'/common/header-dashboard.php');
    include(dirname(__FILE__).'/common/koneksi.php');

    $room_no    = $_GET['id'];

    $select_room  = mysql_query("SELECT * FROM room WHERE room_no='$room_no'");
    $data_room    = mysql_fetch_array($select_room);
    $keterangan        = $data_room['keterangan'];
?>
            <!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Room Update</title>

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
                            <h2>Edit Room</h2>
                        </div>
                        <div class="row contact-wrap"> 
                            <div class="form-group col-md-6 col-md-offset-3">
                                <form action="manage-process.php" method="GET" role="form" class="contactForm">
                                <table>
                                    <tr>
                                        <td width="130px"><h5><b>Room Number</b></h5></td>
                                        <td><h5><b> : </b></h5></td>
                                        <td>
                                            <input type="text" name="room_no" class="form-control" size="60" readonly value="<?php echo($room_no) ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="110px"><h5><b>Administrator ID</b></h5></td>
                                        <td><h5><b> : </b></h5></td>
                                        <td>
                                            <select class="form-control" name="administrator_id">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h5><b>Keterangan</b></h5></td>
                                        <td><h5><b> : </b></h5></td>
                                        <?php echo ($keterangan); ?>
                                    <?php 
                                        if ($keterangan=='Kosong'){
                                         echo  "<td>
                                                <select class='form-control' name='keterangan'>
                                                    <option selected><h5>Kosong</h5></option>
                                                    <option><h5>Terisi</h5></option>
                                                    <option><h5>Perbaikan</h5></option>
                                                </select>
                                            </td>";
                                        }else if ($keterangan=='Perbaikan') {
                                         echo   "<td>
                                                <select class='form-control' name='keterangan'>
                                                    <option><h5>Kosong</h5></option>
                                                    <option><h5>Terisi</h5></option>
                                                    <option selected><h5>Perbaikan</h5></option>
                                                </select>
                                            </td>";
                                        }else{
                                         echo   "<td>
                                                <select class='form-control' name='keterangan'>
                                                    <option><h5>Kosong</h5></option>
                                                    <option selected><h5>Terisi</h5></option>
                                                    <option><h5>Perbaikan</h5></option>
                                                </select>
                                            </td>";
                                        } ?>
                                    </tr>
                            </div>
                                </table>
                                    <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Update</button></div>
                                </form>                     
                            </div>
                        </div>
                    </div>
                </section>    
            </body>
            </html>
    <?php
        require_once(dirname(__FILE__).'/common/footer.php');
    ?>