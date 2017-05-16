<?php
	require_once(dirname(__FILE__).'/common/header-dashboard.php');
	include (dirname(__FILE__).'/common/koneksi.php');
	$query_order       = mysql_query("SELECT * FROM orders")or die(mysql_error());    //Retrieve orders data
    $query_customer    = mysql_query("SELECT * FROM customer")or die(mysql_error());    //Retrieve customer data

    $default_index = 0;
    $default_batas = 4;

    if(isset($_GET['batas'])){
        $default_batas = $_GET['batas'];
    }

    if(isset($_GET['halaman'])){
        $default_index = ($_GET['halaman']-1) * $default_batas;
    }

    $query_porder = mysql_query("SELECT * FROM orders limit ".$default_index.", ".$default_batas);

    $total_baris = mysql_num_rows(mysql_query("SELECT * FROM orders"));

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
                            "<th align='center'><h5><b>Order ID</h5></th>".
                            "<th align='center'><h5><b>Check In</b></h5></th>".
                            "<th align='center'><h5><b>Check Out</b></h5></th>".
                            "<th align='center'><h5><b>Ordered</b></h5></th>".
                            "<th align='center'><h5><b>Room No</b></h5></th>".
                            "<th align='center'><h5><b>Payment</b></h5></th>".
                            "<th align='center'><h5><b>Keterangan</b></h5></th>".
                            "<th width='300px' align='center'><h5><b>Action</b></h5></th>".
                        "<tr/>";

    //perulangan membuat list data
    $nomor_baris = $default_index + 1;
    while($data = mysql_fetch_assoc($query_porder)){
        $output_html .= "<tr>".
                            "<td align='center'><h5><b><a href=view-customer.php?id=".$data['orders_id'].">". $data['orders_id'] ."</a></h5></b>'</td>".
                            "<td align='center'><h5>".$data["check_in"]."</h5></td>".
                            "<td align='center'><h5>".$data["check_out"]."</h5></td>".
                            "<td align='center'><h5>".$data["ordered"]."</h5></td>".
                            "<td align='center'><h5>".$data["room_no"]."</h5></td>".
                            "<td><h5>IDR ".$data["payment"]."</h5></td>".
                            "<td align='center'><h5>".$data["keterangan"]."</h5></td>".
                            "<td width='300px'><a class='btn btn-primary' href=check_in.php?id=".$data['orders_id'].">Check In</a>".
                            "<a class='btn btn-primary' href=check_out.php?id=".$data['orders_id'].">Check Out</a>".
                            "<a class='btn btn-primary' href=delete-order.php?id=".$data['orders_id'].">Delete</a></td>".
                        "</tr>";
        $nomor_baris++;
    }

    $output_html .= "</table>";
?>
<a href=""></a>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order List</title>

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
                <h2>Order List</h2>           
                <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <?php echo $output_html?>
                    <?php echo $html_paging?>
                </div>
            </div>
        </div>
    </div>
<?php
        require_once(dirname(__FILE__).'/common/footer.php');
?>