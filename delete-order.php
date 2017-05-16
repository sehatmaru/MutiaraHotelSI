<?php
	include(dirname(__FILE__).'/common/koneksi.php');
	        
	$orders	= $_GET['id'];

	$select_orders 	= mysql_query("SELECT * FROM orders WHERE orders_id='$orders'");
	$data_orders	= mysql_fetch_array($select_orders);
	$room_no		= $data_orders['room_no'];
	$update_room 	= mysql_query("UPDATE room SET keterangan='Kosong' WHERE room_no='$room_no'");
	$delete_orders 	= mysql_query("DELETE FROM orders WHERE orders_id='$orders'");
	$delete_customer= mysql_query("DELETE FROM customer WHERE customer_id='$orders'");
	$delete_payment = mysql_query("DELETE FROM payment WHERE orders_id='$orders'");

	if ($delete_orders && $delete_customer){
	    header('Location: order-list.php');
	}else{
	    echo "<h1>Error while deleting order</h1>";
	}
?>