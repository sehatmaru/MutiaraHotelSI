<?php
include(dirname(__FILE__).'/common/koneksi.php');
        
$orders_id       = $_GET['id'];

$delete_orders  = mysql_query("DELETE FROM orders WHERE orders_id='$orders_id'");
if ($delete_orders){
    header('Location: order-list.php');
}else{
    echo "<h1>Error while deleting order list</h1>";
}
?>