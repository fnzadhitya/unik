<?php
include('../../conf/config_apd.php');
$nrp		= $_GET['nrp'];
$nama		= $_GET['nama'];
$username	= $_GET['username'];
$password	= $_GET['password'];
$level		= $_GET['level'];

$query = mysqli_query($koneksi, "INSERT INTO tb_users (nrp,nama,username,password,level) VALUES ('$nrp','$nama','$username','$password','$level')");
header('Location: ../index.php?page=data-users')
?>