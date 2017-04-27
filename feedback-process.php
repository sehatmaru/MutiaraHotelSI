<?php
	if(isset($_POST['submit'])){
		include('koneksi.php');
		
		$nama		= $_POST['nama'];
		$alamat		= $_POST['alamat'];
		$email		= $_POST['email'];
		$rate		= $_POST['rate'];
		$komentar	= $_POST['komentar'];
		
		$query = mysql_query("INSERT INTO feedback VALUES(NULL, '$nama', '$alamat', '$email', '$rate', '$komentar')") or die(mysql_error());
		
		if($query){
    		header('Location: feedback-success.php');
        }else{
        	header('Location: feedback-error.php');
        }
    }else{
    	echo '<script>window.history.back()</script>';
    }
?>