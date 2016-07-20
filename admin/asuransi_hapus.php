<?php
include '../config/koneksi.php'; 

$id = $_GET['delete_id'];
$crud->hapus_asuransi($id);
header("Location: asuransi.php?deleted");	

?>