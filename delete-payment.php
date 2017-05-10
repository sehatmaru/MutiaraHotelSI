<?php
include(dirname(__FILE__).'/common/koneksi.php');
        
$orders_payment	= $_GET['id'];

$delete_payment = mysql_query("DELETE FROM payment WHERE orders_id='$orders_payment'");

if ($delete_payment){
    header('Location: payment-list.php');
}else{
    echo "<h1>Error while deleting payment list</h1>";
}
?>