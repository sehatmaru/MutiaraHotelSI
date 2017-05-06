<?php
    if(isset($_POST['submit'])){
        include(dirname(__FILE__).'/common/koneksi.php');

        $phone	= $_POST['phone'];
        
        $query_admin_phone	= mysql_query("SELECT * FROM administrator");
        $data_admin_phone	= mysql_fetch_array($query_admin_phone);
        $admin_phone 		= $data_admin_phone['phone'];
		$query_manager_phone= mysql_query("SELECT * FROM manager");
		$data_manager_phone	= mysql_fetch_array($query_manager_phone);
		$manager_phone 		= $data_manager_phone['phone'];

		if ($data_admin_phone && $data_manager_phone) {
			if ($admin_phone==$phone) {
				header('Location: administrator.php');
			}else if($manager_phone==$phone){
				header('Location: manager.php');
			}else{
				echo "<h1>You enter an invalid number</h1>";
			}
		}else{
			echo "<h1>You have an error</h1>";
		}
    }else{
        echo '<script>window.history.back()</script>';
    }
?>