<?php
    if(isset($_POST['submit'])){
        include(dirname(__FILE__).'/common/koneksi.php');
        
        $query_studio   = mysql_query("SELECT * FROM room WHERE room_type_id='1'")or die(mysql_error());
		$query_superior = mysql_query("SELECT * FROM room WHERE room_type_id='2'")or die(mysql_error());
		$query_deluxe	= mysql_query("SELECT * FROM room WHERE room_type_id='3'")or die(mysql_error());
		$query_exe 		= mysql_query("SELECT * FROM room WHERE room_type_id='4'")or die(mysql_error());

		while ($studio = mysql_fetch_array($query_studio) || $superior = mysql_fetch_array($query_superior) || $deluxe = mysql_fetch_array($query_deluxe) || $executive = mysql_fetch_array($query_exe)) {
			$kstudio	= $_POST['studio'];
			$ksuperior	= $_POST['$superior_no'];
	    	$kdeluxe	= $_POST['$deluxe_no'];
	    	$kexecutive	= $_POST['$exe_no'];

			$update_studio 		=  "UPDATE room SET keterangan='$kstudio' WHERE room_type_id='1'";
			$update_superior	=  "UPDATE room SET keterangan='$ksuperior' WHERE room_type_id='2'";
			$update_deluxe 		=  "UPDATE room SET keterangan='$kdeluxe' WHERE room_type_id='3'";
			$update_executive 	=  "UPDATE room SET keterangan='$kexecutive' WHERE room_type_id='4'";
		}

		if (($update_studio) && ($update_superior) && ($update_deluxe) && ($update_executive)) {
		?>
			<div class="text-center"><h5><b>Success !</b></h5></div><?php
		}else{?>
			<div class="text-center"><h5><b>Error !</b></h5></div>
		<?php
		}
    }else{
        echo '<script>window.history.back()</script>';
    }
?>