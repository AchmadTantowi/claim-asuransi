<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
try
{
	$con = new PDO('mysql:host=localhost;
						dbname=claim_asuransi', 
						'root', 
						'', array(PDO::ATTR_PERSISTENT => true));
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

include_once 'crudclass.php';
$crud = new crud($con);

?>