<?php
    error_reporting(0);
    require_once(dirname(__FILE__).'/common/header-dashboard.php');
    include(dirname(__FILE__).'/common/koneksi.php');
    include(dirname(__FILE__).'/common/pagination.php');

    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
        $keyword=$_REQUEST['keyword'];
        $reload = "payment-list.php?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM payment WHERE orders_id LIKE '%$keyword%' ORDER BY orders_id";
        $result = mysql_query($sql);
    }else{
        $reload = "payment-list.php?pagination=true";
        $sql =  "SELECT * FROM payment ORDER BY orders_id";
        $result = mysql_query($sql);
    }
        
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

                <title>Payment List</title>

                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="css/font-awesome.min.css">
                <link rel="stylesheet" href="css/animate.css">
                <link href="css/animate.min.css" rel="stylesheet"> 
                <link href="css/style.css" rel="stylesheet" />

<<<<<<< HEAD
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
                    <?php
                        if($_REQUEST['keyword']<>""){
                    ?>
                    <div class="form-group input-group">
                        <a class="form-control" href="payment-list.php"> Reset Search</a>
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
=======
    $nomor_paging = 1;
    $html_paging = "<ul class='pagination'>";
    while($total_baris - $default_batas > 0){
        $html_paging .= "<li><a href='?halaman=".$nomor_paging."&batas=".$default_batas."'>".$nomor_paging."</a></li>";
        $nomor_paging++;
        $total_baris -= $default_batas;
    }

    if($total_baris > 0){
        $html_paging .= "<li><a href='?halaman=".$nomor_paging."&batas=".$default_batas."'>".$nomor_paging."</a></li>";
    }

    $html_paging .= "</ul>";

    $output_html = "<table class='col-md-12 wow fadeInDown table table-bordered'>".
                        "<tr bgcolor='#F9F9F9'>".
                            "<th width='80px' align='center'><h5><b>Order ID</h5></th>".
                            "<th align='center'><h5><b>Room No</b></h5></th>".
                            "<th align='center'><h5><b>Amount</b></h5></th>".
                            "<th align='center'><h5><b>Bukti</b></h5></th>".
                            "<th width='175px'><h5><b>Action</b></h5></th>".
                        "<tr/>";

    //perulangan membuat list data
    $nomor_baris = $default_index + 1;
    while($data = mysql_fetch_assoc($query_payment)){
        $output_html .= "<tr>".
                            "<td align='center'><h5>".$data['orders_id']."</h5></td>".
                            "<td align='center'><h5>".$data["room_no"]."</h5></td>".
                            "<td align='center'><h5>IDR ".$data["amount"]."</h5></td>".
                            "<td align='center'><img src='" . $data['payment'] . "' style='width:600px; height:300px;'></td>".
                            "<td width='170px'><a class='btn btn-primary' href=verify-payment.php?id=".$data['orders_id'].">Verify</a>".
                            "<a class='btn btn-primary' href=delete-payment.php?id=".$data['orders_id'].">Delete</a></td>".
                        "</tr>";
        $nomor_baris++;
    }

    $output_html .= "</table>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment Verification List</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>        
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>  
  </head>
  <body>
    <div class="services">
        <div class="container">
            <div class="text-center">
                <h2>Payment Verification List</h2>           
                <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <?php echo $output_html?>
                    <?php echo $html_paging?>
>>>>>>> ff73f310f039860da1a4b5c5c42672cd84621bac
                </div>
            </div>
            <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <table class="col-md-12 wow fadeInDown table-bordered">
                <thead>
                        <tr bgcolor='#F9F9F9'>
                            <th width='80px' align='center'><h5><b>Order ID</h5></th>
                            <th align='center'><h5><b>Room No</b></h5></th>
                            <th align='center'><h5><b>Amount</b></h5></th>
                            <th align='center'><h5><b>Payed</b></h5></th>
                            <th align='center'><h5><b>Bukti</b></h5></th>
                            <th width='175px'><h5><b>Action</b></h5></th>
                        <tr/>
                </thead>
                <tbody>
                    <?php
                        while(($count<$view) && ($i<$tcount)) {
                            mysql_data_seek($result,$i);
                            $data = mysql_fetch_array($result);
                    ?>
                    <tr>
                        <?php echo "<td align='center'><h5><b><a href=view-customer.php?id=".$data['orders_id'].">". $data['orders_id'] ."</a></h5></b>'</td>"; ?>
                        <td align="center"><h5><?php echo $data ['room_no']; ?></h5></td>
                        <td><h5>IDR <?php echo $data ['amount']; ?></h5></td>
                        <td align="center"><h5><?php echo $data ['payed']; ?></h5></td>
                        <td align='center'><img src="<?php echo $data ['payment'] ?>" style='width:300px; height:400px;'></td>
                        <div class="form-group input-group">
                        <?php
                            echo "<td width='170px'><a class='form-control' href=verify-payment.php?id=".$data['orders_id'].">Verify</a>".
                            "<a class='btn btn-primary' href=delete-payment.php?id=".$data['orders_id'].">Delete</a></td>";
                        ?>
                        </div>
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