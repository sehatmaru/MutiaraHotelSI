<?php 
include "koneksi.php";
$query_mysql = mysql_query("SELECT * FROM feedback")or die(mysql_error());
$nomor = 1;
while($data = mysql_fetch_array($query_mysql)){
?>
<tr>
	<td><?php echo $nomor++; ?></td>
	<td><?php echo $data['nama']; ?></td>
	<td><?php echo $data['alamat']; ?></td>
	<td><?php echo $data['email']; ?></td>
	<td><?php echo $data['rate']; ?></td>
	<td><?php echo $data['komentar']; ?></td>
</tr>
<?php } ?>