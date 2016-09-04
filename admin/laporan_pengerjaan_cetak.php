<?php
error_reporting(0);
include "../config/koneksi2.php";  
include "../config/fungsi_indotgl.php";
include "../config/library.php";
$tanggal = tgl_indo(date("Y m d"));
$jam	 = date("H:i:s");
?>
<style type="text/css">
@media print {
input.noPrint { display: none; }
}


body{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.tbl{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #000000;
}
.lap1 {
	border-top:#000000 1px solid;
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;
}
.lap2 {
	border-top:#000000 1px solid;
	border-left:#000000 1px solid;
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;
}
.lap3 {
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;	
}
.lap4 {
	border-left:#000000 1px solid;
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;	
}
</style>
<script language='JavaScript' type='text/javascript'>
window.print();
</script>
<?php

$id_laporan = $_GET['id'];

?>
<table width="600" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">
	<center>
		<h1>BENGKEL LAYANAN PRIMA</h1>
	</center>
	</td>
  </tr>
  <tr>
	<td align="center" colspan="3"></td>	
  </tr>
  <tr>
    <td colspan="3" align="center"><hr></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
	<b><h2>Laporan Pengerjaan</h2></b>
	<b></b>
	
		<table border='1' width='1100' cellspacing="0" cellpadding="1">
		<thead>
		<tr>
			<th>No</th>
	        <th>No Polisi</th>
	        <th>Las Ketok</th>
	        <th>Dempul</th>
	        <th>Cat</th>
	        <th>Finising</th>
	        <th>Poles</th>
		</tr>
		</thead>		
		<tbody>
		<?php
            $nomor=0;
           
            $hasil = mysql_query("SELECT * FROM laporan_pengerjaan where id_laporan_pengerjaan='$id_laporan'");
            
            while ($dataku = mysql_fetch_array($hasil)) {
        ?>
		<tr>
			<td><center><?php echo $nomor=$nomor+1;?></center></td>
			<td><center><?php echo $dataku['no_polisi'];?></center></td>
			<td><center><?php echo $dataku['las_ketok'];?> Hari</center></td>
			<td><center><?php echo $dataku['dempul'];?> Hari</center></td>
			<td><center><?php echo $dataku['cat'];?> Hari</center></td>
			<td><center><?php echo $dataku['finishing'];?> Hari</center></td>
			<td><center><?php echo $dataku['poles'];?> Hari</center></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	</td>
  </tr>
  <input class="noPrint" type="button" value="Print" onclick="window.print()">
</table>