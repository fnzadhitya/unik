<?php
include('../../conf/config_apd.php');
$nrp		= $_POST['nrp'];
$nama		= $_POST['nama'];
$username	= $_POST['username'];
$password	= $_POST['password'];
$level		= $_POST['level'];

$query = mysqli_query($koneksi, "UPDATE tb_users SET nrp='$nrp',nama='$nama',username='$username',password='$password',level='$level' WHERE nrp='$nrp'");
header('Location: ../index.php?page=data-users')
?>