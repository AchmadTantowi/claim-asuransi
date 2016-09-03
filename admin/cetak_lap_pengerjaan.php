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
// POST tanggal
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$status_pengerjaan = $_POST['status_pengerjaan'];

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
	<b><h2>Laporan Pengerjaan Data Claim</h2></b>
	<b></b>
	
		<table border='1' width='1100' cellspacing="0" cellpadding="1">
		<thead>
		<tr>
			<th>No</th>
	        <th>Nama Pemilik</th>
	        <th>Status Pengerjaan</th>
	        <th>Asuransi</th>
	        <th>Telp</th>
	        <th>Email</th>
	        <th>No.Pol</th>
	        <th>Merk</th>
	        <th>Model</th>
	        <th>Warna</th>
	        <th>Tahun</th>
	        <th>Tgl Claim</th>
	        <th>Tgl Selesai</th>
		</tr>
		</thead>		
		<tbody>
		<?php
            $nomor=0;
            if($status_pengerjaan == 'all'){
            $hasil = mysql_query("SELECT * FROM data_claim, asuransi, status_pengerjaan where data_claim.asuransi=asuransi.id_asuransi and data_claim.id_status=status_pengerjaan.id_status and data_claim.tgl_claim between '$tgl_awal' and '$tgl_akhir'");
            }else{
            $hasil = mysql_query("SELECT * FROM data_claim, asuransi, status_pengerjaan where data_claim.asuransi=asuransi.id_asuransi and data_claim.id_status=status_pengerjaan.id_status and data_claim.tgl_claim between '$tgl_awal' and '$tgl_akhir' and data_claim.id_status='$status_pengerjaan'");
        	}
            while ($dataku = mysql_fetch_array($hasil)) {
        ?>
		<tr>
			<td><center><?php echo $nomor=$nomor+1;?></center></td>
			<td><center><?php echo $dataku['nama_pemilik'];?></center></td>
			<td><center><?php echo $dataku['nama_status'];?></center></td>
			<td><center><?php echo $dataku['nama_asuransi'];?></center></td>
			<td><center><?php echo $dataku['no_telp'];?></center></td>
			<td><center><?php echo $dataku['email'];?></center></td>
			<td><center><?php echo $dataku['no_polisi'];?></center></td>
			<td><center><?php echo $dataku['merk_mobil'];?></center></td>
			<td><center><?php echo $dataku['model_mobil'];?></center></td>
			<td><center><?php echo $dataku['warna_mobil'];?></center></td>
			<td><center><?php echo $dataku['tahun_mobil'];?></center></td>
			<td><center><?php echo tgl_indo($dataku['tgl_claim']);?></center></td>
			<td><center><?php echo tgl_indo($dataku['tgl_selesai']);?></center></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	</td>
  </tr>
  <input class="noPrint" type="button" value="Print" onclick="window.print()">
</table>