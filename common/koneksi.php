<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "p1d3ti03_hotel2";
 
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $user, $pass, $name)) or die("Koneksi ke database gagal!");
?>