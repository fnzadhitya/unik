<?php
include('../../conf/config_apd.php');
$nrp = $_GET['nrp'];
$query = mysqli_query($koneksi, "DELETE FROM tb_users WHERE nrp='$nrp'");
header('Location: ../index.php?page=data-users')
?>