<?php
    error_reporting(0);
    require_once(dirname(__FILE__).'/common/header-dashboard.php');
    include(dirname(__FILE__).'/common/koneksi.php');
    include(dirname(__FILE__).'/common/pagination.php');

    $query_mysql = ("SELECT * FROM feedback")or die(mysql_error());
    $result = mysql_query($query_mysql);
    $view = 5;
    $page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
    $tcount = mysql_num_rows($result);
    $tpages = ($tcount) ? ceil($tcount/$view) : 1;
    $count = 0;
    $i = ($page-1)*$view;
    $no_urut = ($page-1)*$view;
?> 
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Feedback List</title>

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
        <div class="container" style="margin-top: 50px">
            <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <table class="col-md-12 wow fadeInDown table">
                <thead>
                        <tr bgcolor='#F9F9F9'>
                            <th width='80px' align='center'><h5><b>Nama</h5></th>
                            <th align='center'><h5><b>Rate</b></h5></th>
                            <th align='center'><h5><b>Komentar</b></h5></th>
                        <tr/>
                </thead>
                <tbody>
                    <?php
                        while(($count<$view) && ($i<$tcount)) {
                            mysql_data_seek($result,$i);
                            $data = mysql_fetch_array($result);
                    ?>
                    <tr>
                        <td width="300px"><h5><?php echo $data ['name']; ?></h5></td>
                        <td align="center" width="50px"><h5><?php echo $data ['rate']; ?></h5></td>
                        <td align="center"><h5><?php echo $data ['comment']; ?></h5></td>
                    </tr>
                    <?php
                            $i++; 
                            $count++;
                        }
                    ?>
                </tbody>
            </table>
            </div>
            <div align="center"><?php echo paginate_one($reload, $page, $tpages); ?></div>
        </div>
<?php 
    require_once(dirname(__FILE__).'/common/footer.php');
?>