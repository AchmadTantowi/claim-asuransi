<?php
include '../config/koneksi.php'; 

$id = $_GET['delete_id'];
$crud->claim_hapus($id);
header("Location: claim.php?deleted");	

?>