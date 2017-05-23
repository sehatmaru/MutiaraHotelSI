<?php
$host = "localhost";
$user = "p1d3ti03";
$pass = "Marusam-pc48";
$name = "p1d3ti03_hotel2";
 
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $user, $pass, $name)) or die("Koneksi ke database gagal!");
?>