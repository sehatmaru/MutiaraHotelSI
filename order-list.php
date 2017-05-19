<?php
    error_reporting(0);
    require_once(dirname(__FILE__).'/common/header-dashboard.php');
    include(dirname(__FILE__).'/common/koneksi.php');
    include(dirname(__FILE__).'/common/pagination.php');

    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
        $keyword=$_REQUEST['keyword'];
        $reload = "order-list.php?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM orders WHERE orders_id LIKE '%$keyword%' ORDER BY orders_id";
        $result = mysql_query($sql);
    }else{
        $reload = "order-list.php?pagination=true";
        $sql =  "SELECT * FROM orders ORDER BY orders_id";
        $result = mysql_query($sql);
    }

    $rpp = 5;
    $page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
    $tcount = mysql_num_rows($result);
    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1;
    $count = 0;
    $i = ($page-1)*$rpp;
    $no_urut = ($page-1)*$rpp;
?> 
<!doctype html>
<html>
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
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-lg-8">
                    <!--muncul jika ada pencarian (tombol reset pencarian)-->
                    <?php
                    if($_REQUEST['keyword']<>""){
                    ?>
                        <div class="form-group input-group">
                            <a class="form-control" href="order-list.php"> Reset Pencarian</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-lg-4 text-right">
                    <form method="post" action="">
                        <div class="form-group input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Search Order ID..." value="<?php echo $_REQUEST['keyword']; ?>">
                            <span class="input-group-btn">
                                <button class="form-control" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr bgcolor="#F9F9F9">
                        <th><h5><b>Order ID</b></h5></th>
                        <th><h5><b>Check In</b></h5></th>
                        <th><h5><b>Check Out</b></h5></th>
                        <th><h5><b>Ordered</b></h5></th>
                        <th><h5><b>Room No</b></h5></th>
                        <th><h5><b>Amount</b></h5></th>
                        <th><h5><b>Status</b></h5></th>
                        <th><h5><b>Action</b></h5></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
                    ?>
                    <tr>
                        <?php echo "<td align='center'><h5><b><a href=view-customer.php?id=".$data['orders_id'].">". $data['orders_id'] ."</a></h5></b>'</td>"; ?>
                        <td align="center"><h5><?php echo $data ['check_in']; ?></h5></td>
                        <td align="center"><h5><?php echo $data ['check_out']; ?></h5></td>
                        <td align="center"><h5><?php echo $data ['ordered']; ?></h5></td>
                        <td align='center'><h5><?php echo $data ['room_no']; ?></h5></td>
                        <td><h5>IDR <?php echo $data ['payment']; ?></h5></td>
                        <td align="center"><h5><?php echo $data ['keterangan']; ?></h5></td>
                        <?php
                            echo "<td width='300px'><a class='btn btn-primary' href=check_in.php?id=".$data['orders_id'].">Check In</a>".
                            "<a class='btn btn-primary' href=check_out.php?id=".$data['orders_id'].">Check Out</a>".
                            "<a class='btn btn-primary' href=delete-order.php?id=".$data['orders_id'].">Delete</a></td>";
                        ?>
                    </tr>
                    <?php
                        $i++; 
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
            <div align="center"><?php echo paginate_one($reload, $page, $tpages); ?></div>
        </div>
    </body>
</html>
<?php require_once(dirname(__FILE__).'/common/footer.php'); ?>