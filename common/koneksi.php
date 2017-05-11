<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "p1d3ti03_hotel2";
 
$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");
?>