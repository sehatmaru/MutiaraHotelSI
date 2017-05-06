<?php
include(dirname(__FILE__).'/common/koneksi.php');
        
$orders_id       = $_GET['id'];

$delete_orders  = mysql_query("DELETE FROM payment WHERE orders_id='$orders_id'");
if ($delete_orders){
    header('Location: verification-list.php');
    echo "<h1>Delete Succesfull</h1>";
}else{
    echo "<h1>Error while deleting verification list</h1>";
}
?>