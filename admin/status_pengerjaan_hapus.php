<?php
include '../config/koneksi.php'; 

$id = $_GET['delete_id'];
$crud->hapus_status_pengerjaan($id);
header("Location: status_pengerjaan.php?deleted");	

?>