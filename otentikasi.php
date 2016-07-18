<?php

require 'config/koneksi.php';
session_start();

//tangkap data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "select * from users where username='$username' and password='$password'";

$crud->auth($query);

?>